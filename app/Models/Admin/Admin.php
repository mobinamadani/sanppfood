<?php

namespace App\Models\Admin;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Middleware\AuthenticatesRequests;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use HasFactory;
    use Authenticatable;
    use AuthenticatableTrait;

    protected $fillable =
        [
            'email',
            'password',
        ];
}
