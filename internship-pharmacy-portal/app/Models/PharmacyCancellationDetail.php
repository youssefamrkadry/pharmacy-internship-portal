<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PharmacyCancellationDetail extends Model
{
    use HasFactory, SoftDeletes;

    public function pharmacy_order(): BelongsTo
    {
        return $this->belongsTo(PharmacyOrder::class);
    }

    public function pharmacy_cancellation_reason(): BelongsTo
    {
        return $this->belongsTo(PharmacyCancellationReason::class);
    }
}
