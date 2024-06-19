<?php

namespace App\Models;

use App\Models\seller\Restaurant;
use App\Models\seller\Seller;
use App\Models\Shopper\Shopper;
use App\Models\User\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
//        'restaurant_id',
        'seller_id',
        'user_id',
        'price',
        'status',
    ];

    public function shoppers()
    {
        return $this->belongsToMany(Shopper::class);
    }

    public function sellers()
    {
        return $this->belongsToMany(Seller::class);
    }

    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

}
