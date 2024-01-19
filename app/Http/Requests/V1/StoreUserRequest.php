<?php

namespace App\Http\Requests\V1;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'password' => ['required'],
            'firstname' => ['required'],
            'lastname' => ['required'],
            'email' => ['required', 'email'],
            'phonenumber' => ['required'],
            'address' => ['required'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'password' => bcrypt($this->password),
        ]);
    }
}
