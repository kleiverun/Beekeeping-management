<?php

namespace App\Http\Controllers\form\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\StoreQueenRequest;
use App\Models\Hive;
use App\Models\Queen;

class NewQueenController extends Controller
{
    public function store(StoreQueenRequest $storeQueenRequest)
    {
        $filtered = $storeQueenRequest->except(['hive_id']);
        // Create a new Queen instance
        $queen = Queen::create($filtered);
        if ($queen) {
            if ($storeQueenRequest->has('hive_id')) {
                $queen_id = $queen->id;
                Hive::find($storeQueenRequest->hive_id)->update(['queen_id' => $queen_id]);
            }

            return redirect()->route('dashboard');

        } else {
            return redirect()->route('newQueen');
        }
    }
}
