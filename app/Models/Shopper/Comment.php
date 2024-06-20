<?php

namespace App\Models\Shopper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Comment extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $fillable = [
        'cart_id',
        'score',
        'message',
        'shopper_id',
        'food_id',
        'status',
        'delete_request',
        'response'
    ];

    public function shopper()
    {
        return $this->belongsTo(Shopper::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function scopeFilterComment($query , $cartId)
    {
        return $query->whereIn('cart_id' , $cartId );
    }

    public function scopeCommentByCartId($query , $cartId)
    {
        return $query->where('cart_id' , $cartId);
    }
}
