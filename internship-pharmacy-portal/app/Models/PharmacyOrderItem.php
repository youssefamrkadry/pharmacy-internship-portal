<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PharmacyOrderItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'list_price', 'quantity', 'pharmacy_order_id',
        'image_url', 'form', 'unit'
    ];

    public function pharmacy_order(): BelongsTo
    {
        return $this->belongsTo(PharmacyOrder::class);
    }
}
