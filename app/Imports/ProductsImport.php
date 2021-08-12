<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name'          => $row[0],
            'category_id'   => $row[1],
            'supplier_id'   => $row[2],
            'code'          => $row[3],
            'garage'        => $row[4],
            'route'         => $row[5],
            'photo'         => $row[6],
            'buy_date'      => $row[7],
            'expire_date'   => $row[8],
            'buying_price'  => $row[9],
            'selling_price' => $row[10],
        ]);
    }
}
