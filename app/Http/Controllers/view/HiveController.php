<?php

namespace App\Http\Controllers\view;

use App\Http\Controllers\Controller;
use App\Models\Hive;

class HiveController extends Controller
{
    /**
     * Display all hives for a apiary.
     */
    public function index($idBikuber)
    {
        $allHives = Hive::where('users_id', auth()->user()->id)
        ->where('apiary_id', $idBikuber)
        ->get(); // You need to call get() to execute the query and fetch data.

        return view('hives', compact('allHives'));
    }

    /**
     * Get total number of hives for an apiary.
     *
     * @param $apiary apiary id
     */
    public function totalHivesForApiary($apiary)
    {
        $hives = Hive::where('users_id', auth()->user()->id)
        ->where('apiary_idApiary', $apiary)
        ->get();

        return $hives->count();
    }
}
