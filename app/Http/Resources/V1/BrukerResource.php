<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BrukerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'lastname' => $this->etternavn,
            'phoneNumber' => $this->telefonnr,
            'email' => $this->epost,
            'adress' => $this->adresse,
        ];
    }
}
