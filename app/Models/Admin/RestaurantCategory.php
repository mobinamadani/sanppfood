<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantCategory extends Model
{
    use HasFactory;

    protected $table = 'restaurant_categories';
    protected $fillable = [
        'name',
    ];

    public function FoodCategory(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(FoodCategory::class);
    }
}
