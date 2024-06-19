<?php

namespace App\Models\Shopper;

use App\Models\Order;
use App\Models\seller\Food;
use App\Models\seller\Restaurant;
use App\Models\seller\Seller;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_id',
        'count',
        'price',
        'seller_id',
        'shopper_id',
        'restaurant_id',
    ];

    public function order(){
        return $this->hasOne(Order::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function foods()
    {
        return $this->belongsToMany(Food::class);
    }

    public function shopper()
    {
        return $this->belongsTo(Shopper::class);
    }

}
