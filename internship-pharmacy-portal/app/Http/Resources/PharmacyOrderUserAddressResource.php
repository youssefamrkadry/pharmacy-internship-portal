<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PharmacyOrderUserAddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
            return [
                'address_global_id' => $this->address_global_id,
                'buliding_number' => $this->buliding_number,
                'street_name' => $this->street_name,
                'city' => $this->city,
                'area' => $this->area,
                'type' => $this->type,
                'floor' => $this->floor,
                'apartment' => $this->apartment,
                'landmark' => $this->landmark
            ];
    }
}
