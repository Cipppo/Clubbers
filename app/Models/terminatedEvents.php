<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class terminatedEvents extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = "terminate_events";

    protected $fillable = [
        'idClubber',
        'idEvento',
    ];
}

