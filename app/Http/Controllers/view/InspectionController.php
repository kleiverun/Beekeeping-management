<?php

namespace App\Http\Controllers\view;

use App\Http\Controllers\Controller;
use App\Models\Hive;
use Illuminate\Http\Request;

class InspectionController extends Controller
{
    public function index()
    {
        $hives = Hive::where('user_id', auth()->id())->get();
        return view('newinspection')->with('hives', $hives);
    }
}
