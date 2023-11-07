<?php

namespace App\Http\Controllers\form\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreBigardRequest;
use App\Http\Resources\V1\BigårdCollection;
use App\Models\Bigård;

class BigardController extends Controller
{
    public function store(StoreBigardRequest $storeBigardRequest)
    {
        $storeBigardRequest->merge(['users_id' => auth()->user()->id]);
        if (Bigård::create($storeBigardRequest->all())) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('NyBigård');
        }
    }

    public function getAllBigard()
    {
        $userid = auth()->user()->id;

        return BigårdCollection::collection(Bigård::where('users_id', $userid)->get());
    }
}
