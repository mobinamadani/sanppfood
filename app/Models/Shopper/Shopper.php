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

    public function ShopperAddress(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(ShopperAddress::class)->withPivot('current_address');
    }

    public function currentAddress(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->shopper_addresses()
                ->wherePivot('current_address', true)
                ->first()
        );
    }
}
