<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filiation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'photo_url',
        'map',
        'info',
    ];
}
