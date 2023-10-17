<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class BulkStoreBigardRequest extends FormRequest
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
            '*.bruker_idBruker' => ['required', 'integer'],
            '*.navn' => ['required'],
            '*.adresse' => ['required'],
            '*.created_at' => ['date_format:Y-m-d H:i:s', 'nullable'],
            '*.updated_at' => ['date_format:Y-m-d H:i:s', 'nullable'],
        ];
    }

    protected function prepareForValidation()
    {
        $data = [];
        foreach ($this->toArray() as $obj) {
            $modifiedObj = [
                'bruker_idBruker' => $obj['bruker_idBruker'] ?? null,
                'navn' => $obj['navn'] ?? null,
                'adresse' => $obj['adresse'] ?? null,
                'created_at' => $obj['created_at'] ?? null,
                'updated_at' => $obj['updated_at'] ?? null,
            ];

            $data[] = $modifiedObj;
        }
    }
}
