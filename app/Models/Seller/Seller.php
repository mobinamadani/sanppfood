<?php

namespace App\Models\Seller;

use App\Models\Admin\AuthenticatableTrait;
use App\Models\Order;
use App\Models\Shopper\Cart;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use HasFactory;
    use Authenticatable;
    use AuthenticatableTrait;

    protected $fillable =
        [
            'name',
            'email',
            'phone_number',
            'password',
        ];

    public function restaurant(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function order()
    {
        return $this->belongsToMany(Order::class);
    }
}
