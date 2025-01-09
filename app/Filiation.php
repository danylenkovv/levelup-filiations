<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filiation extends Model
{
    protected $fillable = [
        'name',
        'photo_url',
        'map',
        'info',
    ];
}
