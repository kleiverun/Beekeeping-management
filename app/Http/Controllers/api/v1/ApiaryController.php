<?php

namespace App\Http\Controllers\api\v1;

use App\Filters\V1\ApiaryFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\BulkStoreApiaryRequest;
use App\Http\Requests\V1\StoreApiaryRequest;
use App\Http\Resources\V1\ApiaryCollection;
use App\Http\Resources\V1\ApiaryResource;
use App\Models\Apiary;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

// import auth fasade

class ApiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new apiaryFilter();
        $queryItems = $filter->transform($request);

        if (count($queryItems) == 0) {
            return new ApiaryCollection(apiary::paginate());
        } else {
            $apiaries = apiary::where($queryItems)->paginate();

            return new ApiaryCollection($apiaries->appends($request->query()));
        }
    }

    /**
     * Store a newly created resource in storage.
     * The request is validated by the StoreApiaryRequest class.
     */
    public function store(StoreApiaryRequest $request)
    {
        // Add a authorizaion token to the request
        return new ApiaryResource(Apiary::create($request->all()));
    }

    /**
     * Display the specified resource.
     * If the inkluderIdBikube query parameter is set, the bikuber relation will be loaded.
     */
    public function show(string $id)
    {
        $apiary = apiary::find($id);

        if ($apiary) {
            return new ApiaryResource($apiary);
        }

        return new ApiaryResource(apiary::findOrFail($id));
    }

    /**
     * Create multiple apiary resource in storage.
     */
    public function bulkStore(BulkStoreApiaryRequest $request)
    {
        $bulk = collect($request->all())->map(function ($arr, $key) {
            return Arr::except($arr, ['id', 'created_at', 'updated_at']);
        });
        apiary::insert($bulk->toArray());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
