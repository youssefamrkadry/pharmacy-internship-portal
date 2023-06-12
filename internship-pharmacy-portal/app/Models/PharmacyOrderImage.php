<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PharmacyOrderImage extends Model
{
    use HasFactory, SoftDeletes;
    
    public function pharmacy_order(): BelongsTo
    {
        return $this->belongsTo(PharmacyOrder::class);
    }
}
