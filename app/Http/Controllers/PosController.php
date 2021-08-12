<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function index()
    {
        $products   = Product::all();
        $customers  = Customer::all();
        return view('post.index', compact('products', 'customers'));
    }
}
