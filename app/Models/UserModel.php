<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Authenticatable
{
    protected $table='user';
    protected $fillable=[
        'id',
        'user_name',
        'user_gender',
        'user_phone',
        'email',
        'password',
    ];
}
