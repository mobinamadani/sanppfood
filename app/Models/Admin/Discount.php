<?php

namespace App\Models\Admin;

use App\Models\Seller\Food;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'price',
      'date'
    ];

    public function foods(){
        return $this->hasMany(Food::class);
    }
}
