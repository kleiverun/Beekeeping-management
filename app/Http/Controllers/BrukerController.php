<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bruker;
use Illuminate\Http\Request;

class BrukerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brukere = Bruker::all();
        return response()->json($brukere);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Lager et nytt bruker-objekt og lagrer det i databasen
        $bruker = new Bruker;
        $bruker->passord = $request->passord;
        $bruker->fornavn = $request->fornavn;
        $bruker->etternavn = $request->etternavn;
        $bruker->epost = $request->epost;
        $bruker->telefonnr = $request->telefonnr;
        $bruker->adresse = $request->adresse;
        $bruker->save();
        return response()->json([
            'message' => 'Bruker opprettet',
            'bruker' => $bruker,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($bruker)
    {
        //
        $bruker = Bruker::find($bruker);
        if (!empty($bruker)) {
            return response()->json($bruker);
        } else {
            return response()->json([
                'message' => 'Fant ikke bruker',
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bruker $bruker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bruker $bruker)
    {
        //
    }
}
