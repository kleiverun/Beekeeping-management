<?php

namespace App\Http\Requests\V1;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreHarvestRequest extends FormRequest
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
            'hive_id' => 'required',
            'harvestWeight' => 'required, numeric',
            'supersHarvested' => 'required|numeric|min:0',
            'dateHarvested' => 'required|date',
            'description' => 'required|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'hive_id.required' => 'Du må velge en bikube',
            'harvestWeight.required' => 'Du må fylle inn en vekt',
            'supersHarvested.required' => 'Du må fylle inn antall skattekasser',
            'dateHarvested.required' => 'Du må fylle inn en dato',
            'description.required' => 'Du må fylle inn en beskrivelse',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'created_at' => now(),
        ]);
    }
}
