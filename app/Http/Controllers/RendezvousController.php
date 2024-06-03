<?php

namespace App\Http\Controllers;

use App\Models\NatureRendevou;
use App\Models\Prestation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $nature = NatureRendevou::all();
        // dd($agence);

        return view('rendezvous.prendre', compact('flag_ref', 'flag_creneau', 'flag_recap', 'flag_conf', 'nature'));
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
        $flag_ref = 0;
        $flag_creneau = 0;
        $flag_recap = 0;
        $flag_conf = 1;

        return view('rendezvous.prendre', compact('flag_ref', 'flag_creneau', 'flag_recap', 'flag_conf'));
    }

    public function GetPrestation(Request $request)
    {

        $prestation = Prestation::where('nature_id', $request->nature)->get();
        // dd($prestation);
        // $data = $prestation;

        return response()->json($prestation, 200);
    }
}
