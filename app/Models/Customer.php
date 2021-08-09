<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'shop_name',
        'photo',
        'bank_name',
        'bank_branch',
        'account_holder',
        'account_number',
        'city',
    ];
}
