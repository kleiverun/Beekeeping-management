<?php

namespace App\Http\Controllers\view;

use App\Http\Controllers\Controller;
use App\Models\Apiary;
use Illuminate\Http\Request;

class AllInspectionController extends Controller
{
    public function index($apiaryId)
    {
        $apiary = Apiary::find($apiaryId); // Replace $apiaryId with the actual ID of your apiary

// Access inspections for all hives in the apiary
        $inspections = $apiary->hives->flatMap->inspections;
        return view('inspections', compact('inspections'));
    }
}
