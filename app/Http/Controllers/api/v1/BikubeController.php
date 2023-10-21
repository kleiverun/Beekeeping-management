<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreBikubeRequest;
use App\Http\Resources\V1\BikubeCollection;
use App\Http\Resources\V1\BikubeResource;
use App\Models\Bikube;
use Illuminate\Http\Request;

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
        // return new BikubeCollection(Bikube::all());
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
     *  http://127.0.0.1:8000/api/v1/bikuber/1?inkluderIdBigård=true.
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
     */
    public function update(Request $request, Bikube $bikube)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bikube $bikube)
    {
    }
}
