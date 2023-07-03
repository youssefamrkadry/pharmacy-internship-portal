<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PharmacyOrderItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'list_price' => $this->list_price,
            'quantity' => $this->quantity,
            'image_url' => $this->image_url,
            'form' => $this->form,
            'unit' => $this->unit
        ];
    }
}
