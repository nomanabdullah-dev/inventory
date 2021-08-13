<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;


class PosController extends Controller
{
    public function index()
    {
        $products   = Product::all();
        $customers  = Customer::all();
        return view('pos.index', compact('products', 'customers'));
    }

    public function pendingOrder(){
        $pending = Order::where('order_status', 'pending')->get();
        $customer = Customer::all();
        return view('order.index', compact('pending', 'customer'));
    }

    public function successOrder(){
        $approved = Order::where('order_status', 'approved')->get();
        $customer = Customer::all();
        return view('order.success', compact('approved', 'customer'));
    }

    public function orderStatus($id){
        $order          = Order::where('id', $id)->first();
        $customer       = Customer::all();
        $order_datails  = OrderDetail::all();
        $product        = Product::all();
        return view('order.show', compact('order', 'customer', 'order_datails', 'product'));
    }

    public function orderDone($id){
        $approved = Order::where('id', $id)->update(['order_status'=>'approved']);
        if($approved) {
            $notification  = [
            'message'=>'Ordered Confirmed Successfully! and all products delivered.',
            'alert-type'=> 'success'
            ];
            return redirect()->route('pending.order')->with($notification);
        }else {
            $notification  = [
                'message'=>'Something goes wrong!',
                'alert-type'=> 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }
}
