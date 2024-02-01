<?php

namespace App\Http\Controllers\view;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ApiaryCollection;
use App\Models\Apiary;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        //Get only all the lattiude and longitude from the apiary table where the user_id is the same as the logged in user
        $cordinates = Apiary::where('user_id', auth()->user()->id)->get(['latitude', 'longitude', 'name']);

        return view('dashboard')->with('cordinates', $cordinates);
    }


}
