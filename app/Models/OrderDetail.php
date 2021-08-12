<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable =[
        'order_id',
        'product_id',
        'quantity',
        'unitcost',
        'total',
    ];

    public function products(){
        return $this->belongsTo(Product::class);
    }
}