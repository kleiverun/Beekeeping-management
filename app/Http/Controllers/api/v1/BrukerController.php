<?php

namespace App\Http\Controllers\api\v1;

use App\Filters\V1\BrukerFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\BrukerCollection;
use App\Http\Resources\V1\BrukerResource;
use App\Models\Bruker;
use Illuminate\Http\Request;

class BrukerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new BrukerFilter();
        $queryItems = $filter->transform($request);

        $inkluderBigårder = $request->query('inkluderBigårder');
        $brukere = Bruker::where($queryItems);

        if ($inkluderBigårder) {
            $brukere = $brukere->with('bigårder');
        }

        return new BrukerCollection($brukere->paginate()->appends($request->query()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new BrukerResource(Bruker::findOrFail($id));
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Lager et nytt bruker-objekt og lagrer det i databasen
        if (!empty($request->passord) && !empty($request->fornavn)
        && !empty($request->etternavn) && !empty($request->epost)
        && !empty($request->telefonnr) && !empty($request->adresse)) {
            $bruker = new Bruker();
            $bruker->passord = $request->passord;
            $bruker->fornavn = $request->fornavn;
            $bruker->etternavn = $request->etternavn;
            $bruker->epost = $request->epost;
            $bruker->telefonnr = $request->telefonnr;
            $bruker->adresse = $request->adresse;
            $bruker->save();
        }

        return response()->json([
        'message' => 'Bruker opprettet',
        'bruker' => $bruker,
        ], 201);
    }

    /* Update the specified resource in storage.
    *
    */
    public function update(Request $request, Bruker $bruker)
    {
    }

    /*
       * Remove the specified resource from storage.
        */
    public function destroy(Bruker $bruker)
    {
        $bruker->delete();

        return response()->json([
        'message' => 'Bruker slettet',
        ], 200);
    }
}
