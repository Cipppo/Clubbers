<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Club extends Authenticatable
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'club';

    protected $fillable = [
        'name', 
        'email', 
        'phone', 
        'password',
        'via', 
        'CAP', 
        'comune', 
        'regione',
    ];
    
    protected $hidden = [
        'password',
    ];

}
