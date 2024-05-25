<?php

namespace App\Models\Shopper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopperAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'address',
        'latitude',
        'longitude',
        'shopper_id'
    ];

    public function Shopper(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsToMany(Shopper::class);
    }
}
