<?php

namespace App\Http\Controllers;

use App\Mail\Rendezvous;
use App\Models\NatureRendevou;
use App\Models\PrestaRendevou;
use App\Models\Rendezvou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class RendezvousController extends Controller
{
    public function Index()
    {

        return view('rendezvous.index');
    }

    public function Prendre()
    {

        $agence = DB::table('agence')->get();
        $nature = NatureRendevou::orderBy('id', 'DESC')->get();
        // dd($agence);

        return view('rendezvous.prendre', compact('nature', 'agence'));
    }

    public function Gestion()
    {

        return view('rendezvous.gestion');
    }

    public function Edit(Request $request)
    {
        $email = $request->email;
        $no_conf = $request->no_conf;
        $telephone = $request->telephone;

        if ($no_conf != null) {
            $info = Rendezvou::where('no_conf', $no_conf)->get();
            //dd(count($info));
            if (count($info) == 0) {
                Alert::error('error', 'Ce Numero est incorrect');

                return redirect()->back();
            } else {
                return view('rendezvous.edit', compact('info'));
            }
        } elseif ($email != null) {
            $info = Rendezvou::where('email', $email)->get();
            //dd(count($info));
            if (count($info) == 0) {
                Alert::error('error', 'Cet email est incorrect');

                return redirect()->back();
            } elseif (count($info) > 1) {
                //dd($info);

                return view('rendezvous.liste', compact('info'));
            } else {
                return view('rendezvous.edit', compact('info'));
            }
        } elseif ($telephone != null) {
            $info = Rendezvou::where('telephone', $telephone)->get();

            if (count($info) == 0) {
                Alert::error('error', 'Ce Numero est incorrect');

                return redirect()->back();
            } elseif (count($info) > 1) {
                return view('rendezvous.liste', compact('info'));
            } else {
                return view('rendezvous.edit', compact('info'));
            }
        } elseif ($telephone != null && $email != null && $telephone != null) {
            $info = Rendezvou::where('telephone', $telephone)->where('email', $email)->where('no_conf', $no_conf)->get();

            if (count($info) == 0) {
                Alert::error('error', 'Information incorrecte');

                return redirect()->back();
            } else {
                return view('rendezvous.edit', compact('info'));
            }
        } else {
            Alert::error('error', 'Les champs ne doivent pas etre vide');

            return redirect()->back();
        }

    }

    public function Delete($id)
    {
        $delete = Rendezvou::where('no_conf', $id)->delete();

        return view('rendezvous.delete');

    }

    // public function Reference(Request $request)
    // {
    //     $flag_ref = 0;
    //     $flag_creneau = 1;
    //     $flag_recap = 0;
    //     $flag_conf = 0;

    //     return view('rendezvous.prendre', compact('flag_ref', 'flag_creneau', 'flag_recap', 'flag_conf'));
    // }

    // public function Recap(Request $request)
    // {
    //     $flag_ref = 0;
    //     $flag_creneau = 0;
    //     $flag_recap = 1;
    //     $flag_conf = 0;

    //     return view('rendezvous.prendre', compact('flag_ref', 'flag_creneau', 'flag_recap', 'flag_conf'));
    // }

    public function Conf(Request $request)
    {

        //dd($request->all());
        $nature = NatureRendevou::find($request->nature);
        $prestation = $request->prestation;
        if ($prestation == 'Autres') {
            $conf_id = uniqid();
            $rendezvous = new Rendezvou();
            $rendezvous->no_conf = $conf_id;
            $rendezvous->nom = $request->nom;
            $rendezvous->prenom = $request->prenom;
            $rendezvous->no_employe = $request->no_employe;
            $rendezvous->adresse = $request->adresse;
            $rendezvous->agence = $request->region;
            $rendezvous->nature = $nature->libelle;
            $rendezvous->prestation = $request->autre;
            $rendezvous->date_rendezvous = $request->date_rendezvous;
            $rendezvous->heure_rendezvous = $request->heure_rendezvous;
            $rendezvous->telephone = $request->telephone;
            $rendezvous->email = $request->email;
            $rendezvous->save();

            $email = $request->email;
            $nom = $request->nom;
            $prenom = $request->prenom;
            $code = $conf_id;
            Mail::to($email)->send(new Rendezvous($code, $email, $prenom, $nom));

            return view('rendezvous.confirmation', compact('conf_id'));
        } else {
            $conf_id = uniqid();
            $rendezvous = new Rendezvou();
            $rendezvous->no_conf = $conf_id;
            $rendezvous->nom = $request->nom;
            $rendezvous->prenom = $request->prenom;
            $rendezvous->no_employe = $request->no_employe;
            $rendezvous->adresse = $request->adresse;
            $rendezvous->agence = $request->region;
            $rendezvous->nature = $nature->libelle;
            $rendezvous->prestation = $request->prestation;
            $rendezvous->date_rendezvous = $request->date_rendezvous;
            $rendezvous->heure_rendezvous = $request->heure_rendezvous;
            $rendezvous->telephone = $request->telephone;
            $rendezvous->email = $request->email;
            $rendezvous->save();

            $email = $request->email;
            $nom = $request->nom;
            $prenom = $request->prenom;
            $code = $conf_id;
            Mail::to($email)->send(new Rendezvous($code, $email, $prenom, $nom));

            return view('rendezvous.confirmation', compact('conf_id'));
        }

        //dd($request->region);

    }

    public function GetPrestation(Request $request)
    {

        //dd($request->nature);
        $prestation = PrestaRendevou::where('nature_id', $request->nature_val)->get();
        //dd($prestation);
        // $data = $prestation;

        return response()->json($prestation, 200);
    }

    public function RecapPdf($id)
    {
        $data = [];
        $data['rendezvous'] = Rendezvou::where('no_conf', $id)->get();
        $pdf = PDF::loadView('pdf.recap', $data);

        return $pdf->stream('document.pdf');

    }
}
