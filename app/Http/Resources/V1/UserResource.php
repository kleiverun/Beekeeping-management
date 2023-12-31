<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'lastname' => $this->lastname,
            'phoneNumber' => $this->phonenumber,
            'email' => $this->email,
            'address' => $this->address,
            'apiary' => ApiaryResource::collection($this->whenLoaded('apiaries')),
        ];
    }
}
