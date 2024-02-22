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
        $allHives = Hive::where('user_id', auth()->user()->id)
            ->where('apiary_id', $idBikuber)
            ->paginate(20); // Removed `->get()`

        return view('hives', compact('allHives'));

    }


}
