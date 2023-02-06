<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event_banner extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "event_banner";

    protected $fillable = [
        'eventId', 
        'URL', 
        'alt',
    ];
}
