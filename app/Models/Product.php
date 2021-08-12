<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'supplier_id',
        'code',
        'garage',
        'route',
        'photo',
        'buy_date',
        'expire_date',
        'buying_price',
        'selling_price',
    ];

    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }
}
