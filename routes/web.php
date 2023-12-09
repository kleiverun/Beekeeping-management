<?php

use App\Models\Apiary;
use App\Models\Hive;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    // Route to the page where you can register a new apiary
    Route::get('/newApiary', function () {
        return view('newapiary');
    })->name('newApiary');
    // Route to the page where you can register a new hive
    Route::get('/newHive', function () {
        $apiaries = apiary::where('users_id', auth()->user()->id)->get();
        if ($apiaries->isEmpty()) {
            return redirect('/newApiary')->with('success', 'Du må registrere en bigård før du kan registrere en bikube');
        }

        return view('newhive')->with('apiaries', $apiaries);
    })->name('newHive');
    // Route to the page where you see and register new harvests
    Route::get('/newHarvest', function () {
        $userId = auth()->user()->id;
        $hives = Hive::where('users_id', $userId)->get(); // Use get() to retrieve the results
        if ($hives->isEmpty()) { // Check if the collection is empty
            return redirect('/newHive')->with('success', 'Du må registrere en bikube før du kan registrere en innhøsting');
        }

        $user = User::find($userId);
        $harvests = $user->hives->flatMap->harvests;

        return view('newharvest')->with('hives', $hives)->with('harvests', $harvests);
    })->name('newHarvest');

    // Route to the page where you can see all the apiaries you have registered
    Route::get('/apiaries', function () {
        $apiaries = Apiary::where('users_id', auth()->user()->id)->get();

        return view('apiaries')->with('apiaries', $apiaries);
    })->name('apiaries');
    // Route to the page where you can register a new queen
    Route::get('/newQueen', function () {
        $hives = Hive::where('users_id', auth()->id())->get();
        return view('newqueen')->with('hives', $hives);
    })->name('newQueen');

    // Routes to store new apiary, hive and queen
    Route::post('/registerApiary', 'App\Http\Controllers\form\v1\ApiaryController@store')->name('ApiaryController.store');
    Route::post('/registerHive', 'App\Http\Controllers\form\v1\NewHiveController@store')->name('NewHiveController.store');
    Route::post('/registerQueen', 'App\Http\Controllers\form\v1\NewQueenController@store')->name('NewQueenController.store');
    // Get all hives for this {id} apiary
    Route::get('/hives/{id}', 'App\Http\Controllers\view\HiveController@index')->name('bikuber.index');
});
