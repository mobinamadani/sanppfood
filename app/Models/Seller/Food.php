<?php

namespace App\Models\Seller;

use App\Models\Admin\FoodCategory;
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

    public function foodcategories(){
        return $this->belongsToMany(FoodCategory::class ,'food_food_category' );
    }
}
