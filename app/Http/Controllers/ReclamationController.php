<?php

namespace App\Http\Controllers;

use App\Mail\ReclaDoneMail;
use App\Mail\ReclamationMail;
use App\Models\Cloture;
use App\Models\Reclamation;
use App\Models\Rendezvou;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mews\Captcha\Facades\Captcha;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class ReclamationController extends Controller
{
    // public function __construct()
    // {
    //     // $this->middleware('auth');
    //       if (!Session::has('loginId')) {
    //          return redirect('login');
    //      }
    // }
    /**
     * Display a listing of the resource.
     */
    public function back()
    {
        // dd(User::find(session('loginId'))->id);
        // dd(Auth::user()->id);
        // if (!Session::has('loginId')) {
        //     return redirect('login');
        // }

        $recla = Reclamation::where('is_done', '0')->count();
        $rendezvous = Rendezvou::where('valider', '0')->count();

        return view('reclamation.back', compact('recla', 'rendezvous'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd($this->generate_rand());
        // $pensionne = DB::connection('metier')->table('pensionne')->limit(10)->get();
        // // $data = DB::connection('metier')->table('pensionne')->where('no_pensionne', 'PI-0001')->get(); #PI-0001/010 #I-0001/2008

        //  dd($pensionne);

        $motifs = DB::table('motifs')->get();
        // dd($motifs);
        $prestations = DB::table('prestations')->get();

        // $captcha = Captcha::create();
        // dd($captcha->image);
        return view('reclamation.create', compact('motifs', 'prestations'));
    }

    public function getInfo(Request $request)
    {
        $value = $request->get('num');
        $type = $request->get('type');
        // dd($type);
        $rep = [];
        if ($type == 'Assure') {
            $data = DB::connection('metier')
                ->table('employe')
                ->where('no_employe', $value)
                ->get(); //130030000771 #2004054840400
            if (count($data) <= 0) {
                $rep[] = 'non';
                $rep[] =
                    "Ce N° d'immatriculation n'est pas associé à un employé de la CNSS, veuillez entrer le bon numéro d'immatriculation.";

                return response()->json($rep);
            }

            foreach ($data as $d) {
                $rep[] = $d->nom;
                $rep[] = $d->prenoms;
                $rep[] = $d->date_naissance;
                $rep[] = $d->adresse;
            }
        } elseif ($type == 'Employeur') {
            $data = DB::connection('metier')
                ->table('employeur')
                ->where('no_employeur', $value)
                ->get(); //8204000010400 #6104000050400
            if (count($data) <= 0) {
                $rep[] = 'non';
                $rep[] =
                    "Ce N° d'immatriculation n'est pas associé à un employeur de la CNSS, veuillez entrer le bon numéro d'immatriculation.";

                return response()->json($rep);
            }

            foreach ($data as $d) {
                $rep[] = $d->nom_demandeur;
                $rep[] = $d->prenom_demandeur;
                $rep[] = $d->date_creation;
                $rep[] = $d->adresse;
            }
        } else {
            $data = DB::connection('metier')
                ->table('pensionne')
                ->where('no_pensionne', $value)
                ->get(); //PI-0001/010 #I-0001/2008
            if (count($data) <= 0) {
                $rep[] = 'non';
                $rep[] =
                    "Ce N° de pension n'est pas associé à un pensionnaire de la CNSS, veuillez entrer le bon numéro de pension.";

                return response()->json($rep);
            }
            foreach ($data as $d) {
                $rep[] = $d->nom;
                $rep[] = $d->prenoms;
                $rep[] = $d->date_naissance;
                $rep[] = $d->adresse;
            }
        }

        // $subCategories = Category::where('parent_id', $input)->get(['id', 'name']);
        return response()->json($rep);
        // return view('reclamation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(json_encode($request->motifs));
        $code = $this->generate_rand();

        $recla = new Reclamation();
        $recla->num_dossier = $code;
        $recla->type = $request->type;
        $recla->numero = $request->numero;
        $recla->nom = $request->nom;
        $recla->prenom = $request->prenom;
        $recla->date_naiss = $request->date_naiss;
        $recla->add_email = $request->add_email;
        $recla->tel = $request->tel;
        $recla->adresse = $request->adresse;
        $recla->prestation_id = $request->prestation;
        $recla->motifs_id = json_encode($request->motifs);
        $recla->details = $request->details;
        $recla->is_done = '0';
        $recla->save();

        // Alert::success('', "Reclamation effectué avec succès");

        if ($request->type == 'Employeur') {
            $head = 'Bonjour ' . $request->nom;
        } else {
            $head = 'Bonjour Mme/M ' . $request->nom . ' ' . $request->prenom;
        }

        $data = [
            'head' => $head,
            'code' => $code,
        ];

        Mail::to('kouroumadev@gmail.com')->send(new ReclamationMail($data));

        return redirect()
            ->back()
            ->with('showModal', true);
    }

    /**
     * Display the specified resource.
     */
    public function dqe()
    {
        $reclamations_process = Reclamation::where('is_done', '0')
            ->orderBy('created_at', 'ASC')
            ->get();

        $reclamations_done = Reclamation::where('is_done', '1')
            ->orderBy('created_at', 'ASC')
            ->get();

        return view(
            'reclamation.dqe',
            compact('reclamations_process', 'reclamations_done')
        );
    }

    public function done(Request $request)
    {
        // dd($request->all());
        $rec = Reclamation::find($request->reclamation_id);
        $rec->is_done = '1';
        $rec->save();

        $cloture = new Cloture();
        $cloture->user_id = User::find(session('loginId'))->id;
        $cloture->reclamation_id = $request->reclamation_id;
        $cloture->details = $request->details;
        $cloture->save();

        //MAIL
        $prestation = DB::table('prestations')
            ->where('id', $rec->prestation_id)
            ->value('value');

        $motifs = json_decode($rec->motifs_id);

        if ($rec->type == 'Employeur') {
            $date_text = 'Date de création';
            $num = 'N° Immatriculation';
        } elseif ($rec->type == 'Assure') {
            $date_text = 'Date de naissance';
            $num = 'N° Immatriculation';
        } else {
            $date_text = 'Date de naissance';
            $num = 'N° Pension';
        }

        $data = [
            'date' => $rec->clotures[0]->created_at,
            'reclamation' => $rec,
            'prestation' => $prestation,
            'date_tex' => $date_text,
            'num' => $num,
            'motifs' => $motifs,
        ];
        $pdf = PDF::loadView('pdf.doneClient', $data);

        if ($rec->type == 'Employeur') {
            $head = 'Bonjour ' . $rec->nom;
        } else {
            $head = 'Bonjour Mme/M ' . $rec->nom . ' ' . $rec->prenom;
        }

        $dataMail = [
            'head' => $head,
            'code' => $rec->num_dossier,
        ];

        Mail::to($rec->add_email)->send(
            new ReclaDoneMail($dataMail, $pdf->output())
        );

        Alert::success('Succès', 'Dossier traité et cloturé avec succès !!');

        return redirect(route('reclamation.dqe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reclamation $reclamation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reclamation $reclamation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reclamation $reclamation)
    {
        //
    }

    /**
     * Generates a unique Radon number.
     */
    public function generate_rand(): string
    {
        $prefix = now()->format('Ymd'); // Using current timestamp as prefix
        $suffix = Str::random(4); // Generating a 6-character suffix

        $radonNumber = $prefix . $suffix;

        // Check if the generated Radon number already exists in the database
        // if ($this->radonNumberExists($radonNumber)) {
        //     // If it exists, regenerate the suffix and try again
        //     return $this->generate_rand();
        // }

        return $radonNumber;
    }

    public function homePdf(int $id)
    {
        $reclamation = Reclamation::find($id);
        $prestation = DB::table('prestations')
            ->where('id', $reclamation->prestation_id)
            ->value('value');

        $motifs = json_decode($reclamation->motifs_id);

        if ($reclamation->type == 'Employeur') {
            $date_text = 'Date de création';
            $num = 'N° Immatriculation';
        } elseif ($reclamation->type == 'Assure') {
            $date_text = 'Date de naissance';
            $num = 'N° Immatriculation';
        } else {
            $date_text = 'Date de naissance';
            $num = 'N° Pension';
        }

        $data = [
            'date' => date('m/d/Y'),
            'reclamation' => $reclamation,
            'prestation' => $prestation,
            'date_tex' => $date_text,
            'num' => $num,
            'motifs' => $motifs,
        ];

        $pdf = PDF::loadView('pdf.home', $data);
        $pdf->setPaper('A4', 'portrait');

        return $pdf->stream('fetat-Payement.pdf');
    }

    public function donePdf(int $id)
    {
        $reclamation = Reclamation::find($id);
        // $reclamation = Reclamation::find($id);
        $prestation = DB::table('prestations')
            ->where('id', $reclamation->prestation_id)
            ->value('value');

        $motifs = json_decode($reclamation->motifs_id);

        if ($reclamation->type == 'Employeur') {
            $date_text = 'Date de création';
            $num = 'N° Immatriculation';
        } elseif ($reclamation->type == 'Assure') {
            $date_text = 'Date de naissance';
            $num = 'N° Immatriculation';
        } else {
            $date_text = 'Date de naissance';
            $num = 'N° Pension';
        }

        $data = [
            'date' => $reclamation->clotures[0]->created_at,
            'reclamation' => $reclamation,
            'prestation' => $prestation,
            'date_tex' => $date_text,
            'num' => $num,
            'motifs' => $motifs,
        ];

        $pdf = PDF::loadView('pdf.done', $data);
        $pdf->setPaper('A4', 'portrait');

        return $pdf->stream('fetat-Payement.pdf');
    }

    public function confMail()
    {
        $reclamation = Reclamation::find(1);
        // dd($reclamation->clotures);
        // $reclamation = Reclamation::find($id);
        $prestation = DB::table('prestations')
            ->where('id', $reclamation->prestation_id)
            ->value('value');

        $motifs = json_decode($reclamation->motifs_id);

        if ($reclamation->type == 'Employeur') {
            $date_text = 'Date de création';
            $num = 'N° Immatriculation';
        } elseif ($reclamation->type == 'Assure') {
            $date_text = 'Date de naissance';
            $num = 'N° Immatriculation';
        } else {
            $date_text = 'Date de naissance';
            $num = 'N° Pension';
        }

        $data = [
            'date' => $reclamation->clotures[0]->created_at,
            'reclamation' => $reclamation,
            'prestation' => $prestation,
            'date_tex' => $date_text,
            'num' => $num,
            'motifs' => $motifs,
        ];

        $pdf = PDF::loadView('pdf.done', $data);

        $dataMail = [
            'head' => 'Bonjour kourouma karim',
            'code' => date('d-m-Y'),
        ];

        // Mail::to('kouroumadev@gmail.com')->send(
        //     new ReclamationMail($dataMail, $pdf->output())
        // );
        // Mail::to($user->email)->send(new SendCredentialsToUserMail($details, $pdf->output()));
        dd('sent');
    }
}