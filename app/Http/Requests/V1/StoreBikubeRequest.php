<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreBikubeRequest extends FormRequest
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
            'bigård_idBigård' => ['required', 'integer'],
            'bruker_idBruker' => ['required', 'integer'],
            'antallSkattekasser' => ['required', 'integer'],
            'updated_at' => ['date_format:Y-m-d H:i:s', 'nullable'],
            'identifikasjon' => ['required'],
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
