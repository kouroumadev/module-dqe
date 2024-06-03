<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

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
        // dd($agence);

        return view('rendezvous.prendre', compact('flag_ref', 'flag_creneau', 'flag_recap', 'flag_conf'));
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
}
