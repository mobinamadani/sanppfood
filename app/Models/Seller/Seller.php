<?php

namespace App\Models\Seller;

use App\Models\Admin\AuthenticatableTrait;
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

}
