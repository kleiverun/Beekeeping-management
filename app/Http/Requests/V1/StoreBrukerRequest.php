<?php

namespace App\Http\Requests\V1;
use Illuminate\Foundation\Http\FormRequest;


class StoreBrukerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'passord' => ['required'],
            'fornavn' => ['required'],
            'etternavn' => ['required'],
            'epost' => ['required', 'email'],
            'telefonnr' => ['required'],
            'adresse' => ['required'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'passord' => bcrypt($this->passord),
        ]);
    }
}
