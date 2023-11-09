<?php

namespace App\Http\Controllers\view;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\BigårdCollection;
use App\Models\Bigård;

class BigardController extends Controller
{
    /**
     * Get all bigårder the user has registered.
     */
    public function index()
    {
        $userid = auth()->user()->id;

        return BigårdCollection::collection(Bigård::where('users_id', $userid)->get());
    }
}
