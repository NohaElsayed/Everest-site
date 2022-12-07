<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employ extends Authenticatable
{
    use HasFactory;
    use HasRoles;
/**
* The attributes that are mass assignable.
*
* @var array
*/
<<<<<<< HEAD
protected $guard_name = 'employs';
=======
protected $guard_name = 'seller';
>>>>>>> a9f6677a4bd5b372b3be4c854229758cb0e41444
protected $fillable = [
'name', 'email', 'password','roles_name','Status','added'
];
}
