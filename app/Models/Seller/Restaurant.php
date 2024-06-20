<?php

namespace App\Models\Seller;

use App\Models\Admin\RestaurantCategory;
use App\Models\Order;
use App\Models\User\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'seller_id',
        'phone_number',
        'address',
        'account',
        'is_open',
        'agenda',
        'total_cost',
        'photo',
    ];


    public function seller(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->belongsTo(Seller::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function cart()
    {
        return $this->hasMany(\App\Models\Shopper\Cart::class);
    }

    public function restaurantCategry(){
        return $this->belongsTo(RestaurantCategory::class);
    }


}
