<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreHiveRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'apiary_id' => ['required', 'integer'],
            'user_id' => ['nullable', 'integer'],
            'queen_id' => ['nullable', 'integer'],
            'super' => ['required', 'integer'],
            'hiveDescription' => ['required', 'string', 'max:255'],
            'hiveStrength' => ['required', 'integer'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'created_at' => now(),
        ]);
    }
}
