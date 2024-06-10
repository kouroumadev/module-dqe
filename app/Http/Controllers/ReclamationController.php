<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class ReclamationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $prestations = DB::table('prestations')->get();
        // dd($data);
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
                ->get(); #130030000771 #2004054840400
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
                ->get(); #8204000010400 #6104000050400
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
                ->get(); #PI-0001/010 #I-0001/2008
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

        $recla = new Reclamation();
        $recla->num_dossier = $this->generate_rand();
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
        return redirect()
            ->back()
            ->with('showModal', true);
    }

    /**
     * Display the specified resource.
     */
    public function dqe()
    {
        $reclamations = Reclamation::all();
        return view('reclamation.dqe', compact('reclamations'));
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
     *
     * @return string
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
}
