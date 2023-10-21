<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BikubeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'IdBikube' => $this->id,
            'IdBigård' => $this->bigård_idBigård,
            'IdBruker' => $this->bruker_idBruker,
            'identifikasjon' => $this->identifikasjon,
            'antallSkattekasser' => $this->antallSkattekasser,
            'estimertStyrke' => $this->estimertStyrke,
            'bigård' => new BigårdResource($this->whenLoaded('bigård')),
        ];
    }
}
