<?php

namespace App\Http\Controllers\view;

use App\Http\Controllers\Controller;
use App\Models\Bikube;
use Illuminate\Http\Request;

class BikuberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($idBikuber)
    {
        $bikuber = Bikube::where('users_id', auth()->user()->id)
        ->where('bigård_idBigård', $idBikuber)
        ->get(); // You need to call get() to execute the query and fetch data.

        return view('bikuber', compact('bikuber'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Bikube $bikube)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bikube $bikube)
    {
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
