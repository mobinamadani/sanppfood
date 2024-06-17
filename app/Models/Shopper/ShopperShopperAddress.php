<?php

namespace App\Models\Shopper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopperShopperAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'address',
        'latitude',
        'longitude',
//        'shopper_id'
    ];

    public function shopper()
    {
        return $this->belongsTo(Shopper::class);
    }

    public function getRouteKeyName()
    {
        return 'id'; // Define the primary key field for route model binding
    }

}
