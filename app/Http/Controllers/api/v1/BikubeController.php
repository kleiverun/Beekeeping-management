<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\BikubeCollection;
use App\Http\Resources\V1\BikubeResource;
use App\Models\Bikube;
use Illuminate\Http\Request;

class BikubeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new BikubeCollection(Bikube::paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     * If the inkluderIdBigård query parameter is set, the bigårder relation will be loaded.
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
