<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PharmacyCancellationReason extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];
    
    public function pharmacy_cancellation_details(): BelongsToMany
    {
        return $this->belongsToMany(PharmacyCancellationDetail::class, 'cancellation_detail_reason', 'reason_id', 'detail_id');
    }
}
