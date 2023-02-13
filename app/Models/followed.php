<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class followed extends Model
{
    use HasFactory;

    public $table = 'followed';
    public $timestamps = false;

    protected $fillable = [
        'from', 
        'to',
    ];
}
