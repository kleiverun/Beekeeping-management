<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HiveResource extends JsonResource
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
            'Idapiary' => $this->apiary_idApiary,
            'IdBruker' => $this->bruker_idBruker,
            'hiveDescription' => $this->hiveDescription,
            'super' => $this->super,
            'hiveStrength' => $this->hiveStrength,
            'apiary' => new ApiaryResource($this->whenLoaded('apiary')),
        ];
    }
}
