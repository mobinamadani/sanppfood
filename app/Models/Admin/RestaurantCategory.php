<?php

namespace App\Models\Admin;

use App\Models\seller\Restaurant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantCategory extends Model
{
    use HasFactory;

    protected $table = 'restaurant_categories';
    protected $fillable = [
        'name',
    ];

    public function restaurants(){
        return $this->hasMany(Restaurant::class);
    }
}
