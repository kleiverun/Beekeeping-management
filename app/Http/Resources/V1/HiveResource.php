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
            'id' => $this->id,
            'apiaryId' => $this->apiary_id,
            'userId' => $this->user_id,
            'queenId' => $this->queen_id,
            'hiveDescription' => $this->hiveDescription,
            'super' => $this->super,
            'hiveStrength' => $this->hiveStrength,
            'apiary' => new ApiaryResource($this->whenLoaded('apiary')),
        ];
    }
}
