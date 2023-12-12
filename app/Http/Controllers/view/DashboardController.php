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
        $userid = auth()->user()->id;

        $apiaries = ApiaryCollection::collection(Apiary::where('users_id', $userid)->get());
        $totalApiaries = $apiaries->count();
        $totalHives = 0;
        foreach ($apiaries as $apiary) {
            $totalHives += $apiary->hives ? $apiary->hives->count() : 0;
        }
        return view('dashboard', ['totalHives' => $totalHives, 'totalApiaries' => $totalApiaries]);
    }


}
