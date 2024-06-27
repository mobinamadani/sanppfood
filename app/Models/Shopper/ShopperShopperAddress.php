<?php

namespace App\Models\Shopper;

use App\Models\Order;
use App\Models\User\Cart;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
class ShopperShopperAddress extends Model implements Authenticatable
{
    use HasFactory;

    use HasApiTokens;

    protected $fillable = [
        'title',
        'address',
        'latitude',
        'longitude',
    ];

    use AuthenticableTrait;

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function addresses()
    {
        return $this->hasMany(ShopperShopperAddress::class);
    }


    public function ShopperAddress(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(ShopperShopperAddress::class)->withPivot('current_address');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function carts()
    {
        return $this->hasMany(\App\Models\Shopper\Cart::class);
    }

}


