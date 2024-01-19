<?php

namespace App\Http\Controllers\form\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreInspectionRequest;
use App\Models\Inspection;
use Illuminate\Http\RedirectResponse;

class InspectionController extends Controller
{
    public function store(StoreInspectionRequest $request): RedirectResponse
    {
        if (Inspection::create($request->all())) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('newInspection');
        }
    }
}
