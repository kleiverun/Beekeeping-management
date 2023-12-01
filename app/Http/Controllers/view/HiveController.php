<?php

namespace App\Http\Controllers\view;

use App\Http\Controllers\Controller;
use App\Models\Hive;

class HiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($idBikuber)
    {
        $bikuber = Hive::where('users_id', auth()->user()->id)
        ->where('apiary_id', $idBikuber)
        ->get(); // You need to call get() to execute the query and fetch data.

        return view('bikuber', compact('bikuber'));
    }

    /**
     * Get total number of hives for an apiary.
     *
     * @param $apiary The apiary id
     */
    public function totalHivesForApiary($apiary)
    {
        $bikuber = Hive::where('users_id', auth()->user()->id)
        ->where('apiary_idApiary', $apiary)
        ->get();

        return $bikuber->count();
    }
}
