<?php

namespace App\Http\Controllers;

use App\Mail\SendEmployeur;
use App\Models\Otp;
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
        $no_employeur = $request->no_employeur;
        if ($no_employeur == '') {
            return response()->json('null', 200);
        } else {
            $data = DB::connection('metier')
                ->table('employeur')
                ->where('no_employeur', $no_employeur)
                ->get(); //8204000010400
            if (count($data) == 0) {
                return response()->json('not exist', 200);
            } else {
                $otp = rand(00000, 99999);
                // dd($otp);
                $otp_store = new Otp();
                $otp_store->code = $otp;
                $otp_store->save();

                Mail::to($email)->send(new SendEmployeur($otp));

                return response()->json('success', 200);
            }
        }
    }

    public function VerifOtpAjax(Request $request)
    {
        $code = $request->otp;
        $otp_db = Otp::all();
        $code_db = $otp_db[0]->code;
        if ($code == $code_db) {
            Otp::whereNotNull('id')->delete();

            return response()->json('success', 200);
        } else {
            return response()->json('not exist', 200);
        }

        dd($code_db);
    }

    ///BACKEND

    public function back()
    {
        $data = DB::connection('metier')
            ->table('employeur')
            ->where('no_employeur', '6104000050400')
            ->get();
        // dd($data);
        return view('biometrie.back', compact('data'));
    }
}
