<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class PharmacyOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_number', 'user_address_id', 'user_id', 'status_id',
        'total_list_price', 'total_discount', 'delivery_charge', 'net_amount',
        'order_notes',  'payment_method_id', 'accepted_at', 'assigned_at'
    ];

    public function pharmacy_order_items(): HasMany
    {
        return $this->hasMany(PharmacyOrderItem::class);
    }

    public function pharmacy_order_images(): HasMany
    {
        return $this->hasMany(PharmacyOrderImage::class);
    }

    public function pharmacy_cancellation_detail(): HasOne
    {
        return $this->hasOne(PharmacyCancellationDetail::class);
    }

    public function pharmacy_order_user(): BelongsTo
    {
        return $this->belongsTo(PharmacyOrderUser::class);
    }

    public function pharmacy_order_user_address(): BelongsTo
    {
        return $this->belongsTo(PharmacyOrderUserAddress::class);
    }

    public function pharmacy_order_status(): BelongsTo
    {
        return $this->belongsTo(PharmacyOrderStatus::class);
    }
}
