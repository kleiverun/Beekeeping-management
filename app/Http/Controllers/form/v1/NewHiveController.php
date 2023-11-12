<?php

namespace App\Http\Controllers\form\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreHiveRequest;
use App\Models\Hive;
use Illuminate\Http\Request;
class NewHiveController extends Controller
{
    public function store(Request $request)
    {
        $request->merge(['users_id' => auth()->user()->id]);
        if (Hive::create($request->all())) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('NyKube');
        }
    }
}
