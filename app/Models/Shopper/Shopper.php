<?php

namespace App\Models\Shopper;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopper extends Model
{
    use HasFactory;

    use HasApiTokens;

    protected $fillable = [
      'name',
      'email',
      'phone_number',
    ];

    public function ShopperAddress(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Shopper\ShopperAddress');
    }

}
