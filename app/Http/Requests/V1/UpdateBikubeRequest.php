<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBikubeRequest extends FormRequest
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
                'identifikasjon' => ['required'],
                'antallSkattekasser' => ['required'],
                'estimertStyrke' => ['required'],
            ];
        } else {
            return [
                'identifikasjon' => ['sometimes', 'required'],
                'antallSkattekasser' => ['sometimes', 'required'],
                'estimertStyrke' => ['sometimes', 'required'],
            ];
        }
    }
}
