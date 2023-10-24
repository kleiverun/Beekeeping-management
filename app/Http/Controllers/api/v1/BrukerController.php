<?php

namespace App\Http\Controllers\api\v1;

use App\Filters\V1\BrukerFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreBrukerRequest;
use App\Http\Requests\V1\UpdateBrukerRequest;
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
     *
     * @example location passord: "password123", fornavn: "John", etternavn: "Doe", epost: "john.doe@example.com", telefonnr: "1234567890", adresse: "1234 Elm St, Some City, Country"
     */
    public function show($id)
    {
        $inkluderBigårder = request()->query('inkluderBigårder');
        $bruker = Bruker::find($id);

        if ($bruker) {
            if ($inkluderBigårder) {
                $bruker->loadMissing('bigårder');
            }

            return new BrukerResource($bruker);
        }

        return new BrukerResource(Bruker::findOrFail($id));
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(StoreBrukerRequest $request)
    {
        return new BrukerResource(Bruker::create($request->validated()));
    }

    /* Update the specified resource in storage.
    *
    */
    public function update(UpdateBrukerRequest $request, $id)
    {
        // Find the Bruker model by its ID
        $bruker = Bruker::find($id);
        echo $request;
        if ($bruker) {
            // Update the Bruker model with the validated data
            $bruker->update($request->validated());
        } else {
            // Bruker with the given ID is not found
            return response()->json([
                'error' => 'Bruker ikke funnet',
            ], 404);
        }
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
