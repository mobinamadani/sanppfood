<?php

namespace App\Models\Seller;

use App\Models\Admin\Discount;
use App\Models\Admin\FoodCategory;
use App\Models\Shopper\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'recipe',
        'price',
        'food_category_id',
        'discount_id',
        'restaurant_id',
        'seller_id',
    ];


    public function category(){
        return $this->belongsToMany(FoodCategory::class );
    }

    public function discount(){
        return $this->belongsTo(Discount::class , 'discount_id');
    }

    public function cart()
    {
        return $this->belongsToMany(Cart::class);
    }
}

