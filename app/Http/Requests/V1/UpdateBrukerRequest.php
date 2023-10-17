<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrukerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();

        if ($method == 'PUT') {
            return [
                'passord' => ['required'],
                'fornavn' => ['required'],
                'etternavn' => ['required'],
                'telefonnr' => ['required'],
                'epost' => ['required', 'email'],
                'adresse' => ['required'],
            ];
        } else {
            return [
                'passord' => ['sometimes', 'required'],
                'fornavn' => ['sometimes', 'required'],
                'etternavn' => ['sometimes', 'required'],
                'epost' => ['sometimes', 'required', 'email'],
                'telefonnr' => ['sometimes', 'required'],
                'adresse' => ['sometimes', 'required'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'passord' => bcrypt($this->passord),
        ]);
    }
}
