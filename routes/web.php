<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
});
Route::get('/setup', function () {
    // This route is now protected and only accessible to authenticated users

    // Check if a user is authenticated
    if (Auth::check()) {
        // Get the authenticated user
        $user = Auth::user();

        // Create token with permissions for create, update, delete
        $adminToken = $user->createToken('admin-token', ['create', 'update', 'delete']);
        // Create token with permissions for create, update
        $updateToken = $user->createToken('update-token', ['create', 'update']);
        // Create a basic token without specific permissions
        $basicToken = $user->createToken('basic-token');

        // Optionally, return the generated tokens or any other response
        return response()->json([
            'adminToken' => $adminToken->plainTextToken,
            'updateToken' => $updateToken->plainTextToken,
            'basicToken' => $basicToken->plainTextToken,
        ]);
    } else {
        // If no user is authenticated, you can handle this situation as needed, e.g., return an error response.
        return response()->json(['error' => 'No user is authenticated'], 401);
    }
});
