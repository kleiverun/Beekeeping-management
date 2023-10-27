<?php

namespace App\Http\Controllers\api\v1;

use App\Filters\V1\UserFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreBrukerRequest;
use App\Http\Requests\V1\UpdateBrukerRequest;
use App\Http\Resources\V1\UserCollection;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new UserFilter();
        $queryItems = $filter->transform($request);

        $inkluderBigårder = $request->query('inkluderBigårder');
        $brukere = User::where($queryItems);

        if ($inkluderBigårder) {
            $brukere = $brukere->with('bigårder');
        }

        return new UserCollection($brukere->paginate()->appends($request->query()));
    }

    /**
     * Display the specified resource.
     *
     * @example location password: "password123", firstname: "John", lastname: "Doe", epost: "john.doe@example.com", phonenumber: "1234567890", adresse: "1234 Elm St, Some City, Country"
     */
    public function show($id)
    {
        $inkluderBigårder = request()->query('inkluderBigårder');
        $bruker = User::find($id);

        if ($bruker) {
            if ($inkluderBigårder) {
                $bruker->loadMissing('bigårder');
            }

            return new UserResource($bruker);
        }

        return new UserResource(User::findOrFail($id));
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(StoreBrukerRequest $request)
    {
        $user = User::create($request->validated());

        if ($user) {
            return response()->json(['message' => 'User created'], 201);
        } else {
            return response()->json(['message' => 'User could not be created'], 500);
        }
    }

    /* Update the specified resource in storage.
    *
    */
    public function update(UpdateBrukerRequest $request, $id)
    {
        // Find the Bruker model by its ID
        $bruker = User::find($id);
        echo $request;
        if ($bruker) {
            // Update the Bruker model with the validated data
            $bruker->update($request->validated());
        } else {
            // Bruker with the given ID is not found
            return response()->json([
                'error' => 'User not found',
            ], 404);
        }
    }

    /*
       * Remove the specified resource from storage.
        */
    public function destroy(user $bruker)
    {
        $bruker->delete();
        if ($bruker->delete) {
            return response()->json([
                'message' => 'User deleted',
                ], 200);
        } else {
            return response()->json([
                'message' => 'User could not be deleted',
                ], 500);
        }
    }
}
