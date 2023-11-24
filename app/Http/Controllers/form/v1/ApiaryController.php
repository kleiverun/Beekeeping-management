<?php

namespace App\Http\Controllers\form\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreApiaryRequest;
use App\Http\Resources\V1\ApiaryCollection;
use App\Models\Apiary;

class ApiaryController extends Controller
{
    public function store(StoreApiaryRequest $storeApiaryRequest)
    {
        $storeApiaryRequest->merge(['users_id' => auth()->user()->id]);
        if (Apiary::create($storeApiaryRequest->all())) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('Nyapiary');
        }
    }

    /**
     * Display all apiaries for a user.
     */
    public function getAllApiary()
    {
        $userid = auth()->user()->id;

        return ApiaryCollection::collection(Apiary::where('users_id', $userid)->get());
    }
}
