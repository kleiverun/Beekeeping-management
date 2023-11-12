<?php

namespace App\Http\Controllers\api\v1;

// use App\Filters\V1\BikubeFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreHiveRequest;
use App\Http\Requests\V1\UpdateHiveRequest;
use App\Http\Resources\V1\BikubeCollection;
use App\Http\Resources\V1\BikubeResource;
use App\Models\Apiary;

class HiveController extends Controller
{
    /**
     * Display all bikuber .
     * Search for a specified hive:
     * Search for all bikuber for a user: http://127.0.0.1:8000/api/v1/bikuber/?brukerId=65.
     */
    public function index()
    {
        $brukerId = request()->query('brukerId');
        if ($brukerId) {
            $bikuber = Apiary::where('bruker_idBruker', $brukerId)->get();

            return new BikubeCollection($bikuber);
        } else {
            return new BikubeCollection(Apiary::all());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHiveRequest $request)
    {
        return new BikubeResource(Apiary::create($request->validated()));
    }

    /**
     * Display the specified hive resource.
     * If the inkluderIdapiary query parameter is set, the apiaries relation will be loaded.
     *  http://127.0.0.1:8000/api/v1/bikuber/{id}?inkluderIdapiary=true.
     */
    public function show($idBikube)
    {
        $inkluderapiary = request()->query('inkluderIdapiary');

        $hive = Apiary::find($idBikube);

        if (!$hive) {
            return new BikubeResource(Apiary::findOrFail($idBikube));
        }

        if ($inkluderapiary) {
            $hive->loadMissing('apiary');
        }

        return new BikubeResource($hive);
    }

    /**
     * Update the specified resource in storage.
     * If the hive is not found, a 404 response is returned.
     */
    public function update(UpdateHiveRequest $UpdateHiveRequest, $id)
    {
        // Find the Bruker model by its ID
        $hive = Apiary::find($id);
        if ($hive) {
            // Update the hive model with the validated data
            $hive->update($UpdateHiveRequest->validated());
            echo $UpdateHiveRequest;
        } else {
            // Bruker with the given ID is not found
            return response()->json([
                'error' => 'Apiary ikke funnet',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apiary $hive)
    {
    }
}
