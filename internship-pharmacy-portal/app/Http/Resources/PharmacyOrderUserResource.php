<?php

namespace App\Http\Resources;

use App\Models\PharmacyOrderUserAddress;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PharmacyOrderUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_global_id' => $this->user_global_id,
            'name' => $this->name,
            'age' => $this->age,
            'mobile_number' => $this->mobile_number,
            'addresses' => PharmacyOrderUserAddressResource::collection(PharmacyOrderUserAddress::where('user_id', $this->id)->get()),
        ];
    }
}
