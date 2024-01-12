<?php

namespace App\Http\Controllers\view;

use App\Http\Controllers\Controller;
use App\Models\Apiary;
use App\Models\Queen;

class NewHiveController extends Controller
{
    public function index()
    {
        $apiaries = Apiary::where('user_id', auth()->user()->id)->get();
        $queens = Queen::where('user_id', auth()->user()->id)->get();
        $queens = $queens->isEmpty() ? null : $queens;
        if ($apiaries->isEmpty()) {
            $successMessage = 'Du må registrere en bigård før du kan registrere en bikube';
            return redirect('newApiary')->with('success', $successMessage);
        }
        return view('newhive')->with('apiaries', $apiaries)->with('queens', $queens);
    }
}
