<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name', 
        'surname',
        'birth', 
        'city',
        'email', 
        'phone', 
        'password', 
        'username',
    ];

    protected $hidden = [
        'password',
    ];


}
