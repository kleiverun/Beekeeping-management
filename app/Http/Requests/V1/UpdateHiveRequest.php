<?php

namespace App\Http\Requests\V1;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateHiveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();

        $user != null && $user->tokenCan('update');
        return true;
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
                'hiveDescription' => ['required'],
                'super' => ['required'],
                'hiveStrength' => ['required'],
            ];
        } else {
            return [
                'hiveDescription' => ['sometimes', 'required'],
                'super' => ['sometimes', 'required'],
                'hiveStrength' => ['sometimes', 'required'],
            ];
        }
    }
}
