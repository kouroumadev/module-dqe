<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BioController extends Controller
{
    public function create()
    {
        return view('bio.create');
    }
}
