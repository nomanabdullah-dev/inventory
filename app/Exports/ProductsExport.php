<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Excel;

class ProductsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select(
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
        )->get();
    }


}
