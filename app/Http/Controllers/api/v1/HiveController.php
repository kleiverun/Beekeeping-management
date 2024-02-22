<?php

namespace App\Http\Controllers\api\v1;

// use App\Filters\V1\HiveFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreHiveRequest;
use App\Http\Requests\V1\UpdateHiveRequest;
use App\Http\Resources\V1\HiveCollection;
use App\Http\Resources\V1\HiveResource;
use App\Models\Hive;
use http\Env\Response;

class HiveController extends Controller
{
    /**
     * Display all bikuber .
     * Search for a specified Hive:
     * Search for all bikuber for a user: http://127.0.0.1:8000/api/v1/bikuber/?brukerId=65.
     */
    public function index()
    {
        $brukerId = request()->query('brukerId');
        if ($brukerId) {
            $bikuber = Hive::where('user_id', $brukerId)->get();

            return new HiveCollection($bikuber);
        } else {
            return new HiveCollection(Hive::all());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHiveRequest $request)
    {
        return new HiveResource(Hive::create($request->validated()));
    }

    /**
     * Display the specified Hive resource.
     * If the inkluderIdapiary query parameter is set, the apiaries relation will be loaded.
     *  http://127.0.0.1:8000/api/v1/hives/{id}?includeIdApiary=true.
     */
    public function show($id)
    {
        $includeApiary = request()->query('includeIdApiary');
        $hive = Hive::find($id);
        if (!$hive) {
            return new HiveResource(Hive::findOrFail($id));
        }

        if ($includeApiary) {
            $hive->loadMissing('Hive');
        }

        return new HiveResource($hive);
    }

    /**
     * Update the specified resource in storage.
     * If the Hive is not found, a 404 response is returned.
     */
    public function update(UpdateHiveRequest $UpdateHiveRequest, $id)
    {
        // Find the user model by its ID
        $Hive = Hive::find($id);
        if ($Hive) {
            $Hive->update($UpdateHiveRequest->validated());
            return response()->json([
                'message' => 'Hive updated successfully'
            ], 200);
        } else {
            // Bruker with the given ID is not found
            return response()->json([
                'message' => 'Hive not found',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $hive = Hive::find($id);
        if ($hive) {
            $hive->delete();
            return response()->json([
                'message' => 'Hive deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'error' => 'Hive not found',
            ], 404);
        }

    }
}
