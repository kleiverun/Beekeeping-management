<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Requests\v1\StoreQueenRequest;
use App\Http\Resources\V1\QueenCollection;
use App\Http\Resources\V1\QueenResource;
use App\Models\Queen;
use Illuminate\Http\Request;

class QueenController extends Controller
{
    /**
     * Display all queens.
     */
    public function index()
    {
        return QueenCollection::collection(Queen::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQueenRequest $request)
    {
        return new QueenResource(Queen::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Queen $queen)
    {
        return new QueenResource($queen);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Queen $queen)
    {
        $queen->delete();

        return response()->json(null, 204);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Queen $queen)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Queen $queen)
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('queen.create');
    }
}
