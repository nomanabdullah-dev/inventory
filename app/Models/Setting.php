<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'com_name',
        'com_address',
        'com_email',
        'com_phone',
        'com_mobile',
        'com_logo',
        'com_city',
        'com_country',
        'com_zipcode',
    ];
}
