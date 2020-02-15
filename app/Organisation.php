<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    protected $fillable = [
        'name',
        'city',
        'country',
        'postal_code',
        'contact_name',
        'contact_email',
        'contact_phone',
    ];
}
