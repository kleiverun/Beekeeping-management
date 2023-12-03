<?php

use App\Models\Apiary;
use App\Models\Hive;
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

    Route::get('/NyKube', function () {
        $apiaries = apiary::where('users_id', auth()->user()->id)->get();
        if ($apiaries->isEmpty()) {
            return redirect('/Nyapiary')->with('success', 'Du må registrere en bigård før du kan registrere en hive');
        }

        return view('nykube')->with('apiaries', $apiaries);
    })->name('NyKube');

    Route::get('/NyApiary', function () {
        return view('nybigård');
    })->name('Nyapiary');

    Route::post('/registerApiary', 'App\Http\Controllers\form\v1\ApiaryController@store')->name('ApiaryController.store');
    Route::post('/registerHive', 'App\Http\Controllers\form\v1\NewHiveController@store');
    Route::post('/registerQueen', 'App\Http\Controllers\form\v1\NewQueenController@store')->name('NewQueenController.store');

    Route::get('/apiaries', function () {
        $apiaries = Apiary::where('users_id', auth()->user()->id)->get();

        return view('apiaries')->with('apiaries', $apiaries);
    })->name('apiaries');

    Route::get('/Bikuber/{id}', 'App\Http\Controllers\view\HiveController@index')->name('bikuber.index');
    Route::get('/newQueen', function () {
        $hives = Hive::where('users_id', auth()->id())->get();

        return view('newqueen')->with('hives', $hives);
    })->name('newQueen');
});
