<?php

use App\Models\Bigård;
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
        return view('nykube');
    })->name('NyKube');

    Route::get('/NyBigård', function () {
        return view('nybigård');
    })->name('NyBigård');
    Route::post('/', 'App\Http\Controllers\form\v1\NybigardController@store')->name('NybigardController.store');

    Route::get('/Bigårder', function () {
        $bigarder = Bigård::where('users_id', auth()->user()->id)->get();

        return view('bigarder')->with('bigårder', $bigarder);
    })->name('Bigårder');

    Route::get('/Bikuber/{id}', 'App\Http\Controllers\view\BikuberController@index')->name('bikuber.index');
});
