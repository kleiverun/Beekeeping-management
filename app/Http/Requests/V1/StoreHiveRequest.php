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
            'apiary_idApiary' => ['required', 'integer'],
            'users_id' => ['nullable', 'integer'],
            'antallSkattekasser' => ['required', 'integer'],
            'identifikasjon' => ['required', 'string', 'max:255'],
            'estimertStyrke' => ['required', 'integer'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'created_at' => now(),
        ]);
    }
}
