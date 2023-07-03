<?php

namespace App\Http\Resources;

use App\Models\PharmacyCancellationDetail;
use App\Models\PharmacyOrderImage;
use App\Models\PharmacyOrderItem;
use App\Models\PharmacyOrderStatus;
use App\Models\PharmacyOrderUser;
use App\Models\PharmacyOrderUserAddress;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PharmacyOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $cancellation_detail = PharmacyCancellationDetail::where('pharmacy_order_id', $this->id)->first();
        $cancellation_reasons = $cancellation_note = null;
        if($cancellation_detail){
            $cancellation_reasons = $cancellation_detail->pharmacy_cancellation_reasons()->pluck('name');
            $cancellation_note = $cancellation_detail->cancellation_note;
        }
        
        return [
            'order' => [
                'order-details' => [
                    'order_number' => $this->order_number,
                    'payment_method_id' => $this->payment_method_id,
                    'assigned_at' => $this->assigned_at,
                    'accepted_at' => $this->accepted_at,
                    'order_notes' => $this->order_notes
                ],
                'order-status' => PharmacyOrderStatus::find($this->status_id)->name,
                'financial-details' => [
                    'total_list_price' => $this->total_list_price,
                    'total_discount' => $this->total_discount,
                    'delivery_charge' => $this->delivery_charge,
                    'net_amount' => $this->net_amount
                ],
                'order-items' => PharmacyOrderItemResource::collection(PharmacyOrderItem::where('pharmacy_order_id', $this->id)->get()),
                'order-images' => PharmacyOrderImage::where('pharmacy_order_id', $this->id)->pluck('image_url'),
                'user-details' => new PharmacyOrderUserResource(PharmacyOrderUser::find($this->user_id)),
                'order-address' => new PharmacyOrderUserAddressResource(PharmacyOrderUserAddress::find($this->user_address_id)),
                'cancellation-reasons' => $cancellation_reasons,
                'cancellation-note' => $cancellation_note,
            ]
        ];
    }
}
