<?php

namespace App\Http\Controllers\view;

use App\Http\Controllers\Controller;
use App\Models\Hive;
use App\Models\User;

class HarvestController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $hives = Hive::where('user_id', $user_id)->get();
        $successMessage = 'Du må registrere en bikube før du kan registrere en innhøsting';
        // Check if the collection is empty
        if ($hives->isEmpty()) {
            return redirect('/newHive')->with('success', $successMessage);
        }
        $user = User::find($user_id);
        $harvests = $user->hives->flatMap->harvests;

        $harvests = $harvests->sortByDesc('dateHarvested');

        return view('newharvest')->with('harvests', $harvests)->with('hives', $hives);
    }
}
