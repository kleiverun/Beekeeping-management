<?php

namespace App\Http\Controllers\view;

use App\Http\Controllers\Controller;
use App\Models\Hive;
use App\Models\User;

class HarvestController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $hives = $user->hives()->with('harvests')->get();

        if ($hives->isEmpty()) {
            return redirect('/newHive')->with('success', 'Du må registrere en bikube før du kan registrere en innhøsting');
        }

        $harvests = $hives->flatMap->harvests->sortByDesc('dateHarvested');

        return view('newharvest', compact('harvests', 'hives'));
    }
}
