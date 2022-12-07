<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
=======
>>>>>>> a9f6677a4bd5b372b3be4c854229758cb0e41444
use Illuminate\Foundation\Auth\User as Authenticatable;

class Delivery extends Authenticatable
{
    use HasFactory;
    protected $guard_name = 'delivery';
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo',
    ];
}
