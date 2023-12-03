<?php

namespace App\Http\Controllers\form\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\StoreQueenRequest;
use App\Models\Queen;

class NewQueenController extends Controller
{
    public function store(StoreQueenRequest $storeQueenRequest)
    {
        if (Queen::create($storeQueenRequest->all())) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('newQueen');
        }
    }
}
