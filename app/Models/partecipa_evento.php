<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class partecipa_evento extends Model
{
    public $timestamps = false;
    public $table = "partecipa_evento";

    protected $fillable = [
        'idClubber',
        'idEvento',
    ];
}
