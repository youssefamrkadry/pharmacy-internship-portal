<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PharmacyOrder extends Model
{
    use HasFactory, SoftDeletes;

    public function pharmacy_order_items(): HasMany
    {
        return $this->hasMany(PharmacyOrderItem::class);
    }

    public function pharmacy_order_images(): HasMany
    {
        return $this->hasMany(PharmacyOrderImage::class);
    }

    public function pharmacy_cancellation_details(): HasMany
    {
        return $this->hasMany(PharmacyCancellationDetail::class);
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
