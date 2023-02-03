<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    public $table = "events";

    protected $fillable = [
        'name', 
        'description', 
        'clubName', 
        'entrances', 
        'Date',
        'Time',
    ];
}
