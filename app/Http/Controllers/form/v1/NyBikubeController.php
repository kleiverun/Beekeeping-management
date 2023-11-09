<?php

namespace App\Http\Controllers\form\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreBikubeRequest;
use App\Models\Bikube;

class NyBikubeController extends Controller
{
    public function store(StoreBikubeRequest $request)
    {
        $request->merge(['users_id' => auth()->user()->id]);
        if (Bikube::create($request->all())) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('NyKube');
        }
    }
}
