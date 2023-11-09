<?php

namespace App\Http\Controllers\api\v1;

// use App\Filters\V1\BikubeFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreBikubeRequest;
use App\Http\Requests\V1\UpdateBikubeRequest;
use App\Http\Resources\V1\BikubeCollection;
use App\Http\Resources\V1\BikubeResource;
use App\Models\Bikube;

class BikubeController extends Controller
{
    /**
     * Display all bikuber .
     * Search for a specified bikube:
     * Search for all bikuber for a user: http://127.0.0.1:8000/api/v1/bikuber/?brukerId=65.
     */
    public function index()
    {
        $brukerId = request()->query('brukerId');
        if ($brukerId) {
            $bikuber = Bikube::where('bruker_idBruker', $brukerId)->get();

            return new BikubeCollection($bikuber);
        } else {
            return new BikubeCollection(Bikube::all());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBikubeRequest $request)
    {
        return new BikubeResource(Bikube::create($request->validated()));
    }

    /**
     * Display the specified bikube resource.
     * If the inkluderIdBigård query parameter is set, the bigårder relation will be loaded.
     *  http://127.0.0.1:8000/api/v1/bikuber/{id}?inkluderIdBigård=true.
     */
    public function show($idBikube)
    {
        $inkluderBigård = request()->query('inkluderIdBigård');

        $bikube = Bikube::find($idBikube);

        if (!$bikube) {
            return new BikubeResource(Bikube::findOrFail($idBikube));
        }

        if ($inkluderBigård) {
            $bikube->loadMissing('bigård');
        }

        return new BikubeResource($bikube);
    }

    /**
     * Update the specified resource in storage.
     * If the bikube is not found, a 404 response is returned.
     */
    public function update(UpdateBikubeRequest $updateBikubeRequest, $id)
    {
        // Find the Bruker model by its ID
        $bikube = Bikube::find($id);
        if ($bikube) {
            // Update the bikube model with the validated data
            $bikube->update($updateBikubeRequest->validated());
            echo $updateBikubeRequest;
        } else {
            // Bruker with the given ID is not found
            return response()->json([
                'error' => 'Bikube ikke funnet',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bikube $bikube)
    {
    }
}
