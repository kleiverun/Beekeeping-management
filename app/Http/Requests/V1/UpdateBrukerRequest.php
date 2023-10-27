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
                'password' => ['required'],
                'firstname' => ['required'],
                'lastname' => ['required'],
                'phonenumber' => ['required'],
                'email' => ['required', 'email'],
                'adress' => ['required'],
            ];
        } else {
            return [
                'password' => ['sometimes', 'required'],
                'firstname' => ['sometimes', 'required'],
                'lastname' => ['sometimes', 'required'],
                'email' => ['sometimes', 'required', 'email'],
                'phonenumber' => ['sometimes', 'required'],
                'adress' => ['sometimes', 'required'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'password' => bcrypt($this->password),
        ]);
    }
}
