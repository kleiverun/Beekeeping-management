<?php

namespace App\Http\Controllers\view;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ApiaryCollection;
use App\Models\Apiary;

class ApiaryController extends Controller
{
    /**
     * Get all apiaries the user has registered.
     */
    public function index()
    {
        $apiaries = Apiary::where('user_id', auth()->user()->id)->get();
        return view('apiaries')->with('apiaries', $apiaries);
    }
}
