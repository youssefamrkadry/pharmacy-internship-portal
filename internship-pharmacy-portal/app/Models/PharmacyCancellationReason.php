<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PharmacyCancellationReason extends Model
{
    use HasFactory, SoftDeletes;
    
    public function pharmacy_cancellation_details(): HasMany
    {
        return $this->hasMany(PharmacyCancellationDetail::class);
    }
}
