<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            // $pensionne = DB::connection('metier')->table('pensionne')->limit(10)->get();
            // $data = DB::connection('metier')->table('pensionne')->where('no_pensionne', 'PI-0001')->get(); #PI-0001/010 #I-0001/2008

            // dd($pensionne);

        $motifs = DB::table('motifs')->get();
            // dd($data);
        return view('reclamation.create', compact('motifs'));
    }
     public function getInfo(Request $request)
    {
        $value = $request->get('num');
        $type = $request->get('type');
        // dd($type);
        $rep = array();
        if($type == 'Assure'){
            $data = DB::connection('metier')->table('employe')->where('no_employe', $value)->get(); #130030000771 #2004054840400
            // dd($data);
            foreach($data as $d){
                $rep[] = $d->nom;
                $rep[] = $d->prenoms;
                $rep[] = $d->date_naissance;
                $rep[] = $d->adresse;
            }
        } else if($type == 'Employeur'){
            $data = DB::connection('metier')->table('employeur')->where('no_employeur', $value)->get(); #8204000010400 #6104000050400
            // dd($data);
            foreach($data as $d){
                $rep[] = $d->nom_demandeur;
                $rep[] = $d->prenom_demandeur;
                $rep[] = $d->date_creation;
                $rep[] = $d->adresse;
            }
        } else {
            $data = DB::connection('metier')->table('pensionne')->where('no_pensionne', $value)->get(); #PI-0001/010 #I-0001/2008
            // dd($data);
            foreach($data as $d){
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reclamation $reclamation)
    {
        //
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
}
