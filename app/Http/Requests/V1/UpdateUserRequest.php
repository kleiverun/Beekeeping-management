<?php

namespace App\Http\Requests\V1;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
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
                'address' => ['required'],
            ];
        } else {
            return [
                'password' => ['sometimes', 'required'],
                'firstname' => ['sometimes', 'required'],
                'lastname' => ['sometimes', 'required'],
                'email' => ['sometimes', 'required', 'email'],
                'phonenumber' => ['sometimes', 'required'],
                'address' => ['sometimes', 'required'],
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
