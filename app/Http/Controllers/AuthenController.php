<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AuthenController extends Controller
{
    public function registration()
    {
        return view('auth.registration');
    }

    public function registerUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|max:12',
        ]);

        $user = new User();
        $user->fill($validatedData);
        $user->save();

        // dd('done');
        Alert::success('Succès', 'Enregistrement effectué avec succès !');

        return redirect()->route('login');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginUser(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4|max:12',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $request->session()->put('loginId', $user->id);
            return redirect(route('reclamation.back'));
        } else {
            return back()->with('fail', 'Invalid credentials.');
        }
    }

    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('login');
        }
    }
}