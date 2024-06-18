<?php

namespace App\Models\Shopper;
namespace App;

use App\Models\Seller\Food;
use App\Models\Seller\Seller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
      'shopper_id',
      'food_id',
      'count',
      'price',
//      'restaurant_id',
      'seller_id',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function food()
    {
        return $this->belongsToMany(Food::class);
    }

    public function shopper()
    {
        return $this->belongsTo(Shopper::class);
    }

}


