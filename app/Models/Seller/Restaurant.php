<?php

namespace App\Models\Seller;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'restaurant_category_id',
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
        return $this->hasOne(Seller::class);
    }
}
