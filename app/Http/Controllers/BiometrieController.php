<?php

namespace App\Http\Controllers;

use App\Mail\SendEmployeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BiometrieController extends Controller
{
    public function BiometrieIndex()
    {

        return view('biometrie.index');
    }

    public function EmployeurInfoAjax(Request $request)
    {

        $num = $request->no_employeur;

        if ($num == '') {
            return response()->json('null', 200);
        } else {
            $data = DB::connection('metier')
                ->table('employeur')
                ->where('no_employeur', $num)
                ->get(); //8204000010400
            if (count($data) == 0) {
                return response()->json('not exist', 200);
            } else {
                return response()->json($data, 200);
            }

        }

    }

    public function SendOtpAjax(Request $request)
    {
        $email = $request->email;
        $otp = rand(00000, 99999);
        // dd($otp);
        Mail::to($email)->send(new SendEmployeur($otp));

        return response()->json('success', 200);

    }
}
