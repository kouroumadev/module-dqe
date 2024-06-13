<?php

namespace App\Http\Controllers;

use App\Models\NatureRendevou;
use App\Models\PrestaRendevou;
use App\Models\Rendezvou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class RendezvousController extends Controller
{
    public function Index()
    {

        return view('rendezvous.index');
    }

    public function Prendre()
    {
        $flag_ref = 1;
        $flag_creneau = 0;
        $flag_recap = 0;
        $flag_conf = 0;
        $agence = DB::table('agence')->get();
        $nature = NatureRendevou::orderBy('id', 'DESC')->get();
        // dd($agence);

        return view('rendezvous.prendre', compact('flag_ref', 'flag_creneau', 'flag_recap', 'flag_conf', 'nature', 'agence'));
    }

    public function Reference(Request $request)
    {
        $flag_ref = 0;
        $flag_creneau = 1;
        $flag_recap = 0;
        $flag_conf = 0;

        return view('rendezvous.prendre', compact('flag_ref', 'flag_creneau', 'flag_recap', 'flag_conf'));
    }

    public function Recap(Request $request)
    {
        $flag_ref = 0;
        $flag_creneau = 0;
        $flag_recap = 1;
        $flag_conf = 0;

        return view('rendezvous.prendre', compact('flag_ref', 'flag_creneau', 'flag_recap', 'flag_conf'));
    }

    public function Conf(Request $request)
    {

        dd($request->all());
        $nature = NatureRendevou::find($request->nature);
        //dd($request->region);
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

        return view('rendezvous.confirmation', compact('conf_id'));
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
