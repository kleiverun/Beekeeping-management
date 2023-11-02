<?php

use App\Models\Bigård;
use Illuminate\Support\Facades\Validator;

class CreateNewBigård
{
    /**
     * Validate and create a newly registered user.
     *
     * @param array<string, string> $input
     */
    public function create(array $input): Bigård
    {
        Validator::make($input, [
        ])->validate();

        return Bigård::create([
        ]);
    }
}
