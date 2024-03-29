<?php

namespace App\Http\Requests\v1;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreQueenRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'hive_id' => ['nullable', 'integer'],
            'queenDate' => ['required', 'date'],
            'queenBreed' => ['required', 'string', 'max:255'],
            'queenDescription' => ['nullable', 'string', 'max:255'],
            'queenMother' => ['nullable', 'integer'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'created_at' => now(),
            'user_id' => auth()->user()->id,
        ]);
    }
}
