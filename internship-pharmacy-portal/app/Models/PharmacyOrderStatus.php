<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PharmacyOrderStatus extends Model
{
    use HasFactory, SoftDeletes;

    public function pharmacy_orders(): HasMany
    {
        return $this->hasMany(PharmacyOrder::class);
    }
}
