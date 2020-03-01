<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /**
     * The mass-assignable properties.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
}
