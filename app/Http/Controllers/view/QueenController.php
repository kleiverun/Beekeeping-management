<?php

namespace App\Http\Controllers\view;

use App\Http\Controllers\Controller;
use App\Models\Hive;
use App\Models\Queen;

class QueenController extends Controller
{
    public function index()
    {
        $hives = Hive::where('user_id', auth()->id())->get();

        // Assuming there's a relationship between Hive and Queen models
        $queens = Queen::where('user_id', auth()->id())->get();
        return view('newqueen')->with('hives', $hives)->with('queens', $queens);
    }
}
