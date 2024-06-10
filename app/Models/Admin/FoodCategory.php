<?php

namespace App\Models\Admin;

use App\Models\seller\Food;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id'
    ];

    public function foods(){
        return $this->belongsToMany(Food::class ,'food_food_category' );
    }

}
