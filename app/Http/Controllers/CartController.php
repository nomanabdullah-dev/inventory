<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $data=array();
        $data['id']     =$request->id;
        $data['name']   =$request->name;
        $data['price']  =$request->price;
        $data['qty']    =$request->qty;
        $data['weight'] =$request->weight;

        $add = Cart::add($data);
        if($add) {
            $notification = [
            'message'   =>'Product Added',
            'alert-type'=> 'success'
            ];
            return redirect()->back()->with($notification);
        }else {
            $notification = [
                'message'   =>'Something goes wrong!',
                'alert-type'=> 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }

    public function update(Request $request, $rowId)
    {
        $qty    =$request->qty;
        $update = Cart::update($rowId, $qty);
        if($update) {
            $notification = [
            'message'   =>'Product Updated',
            'alert-type'=> 'success'
            ];
            return redirect()->back()->with($notification);
        }else {
            $notification = [
                'message'   =>'Something goes wrong!',
                'alert-type'=> 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }

    public function remove($rowId){
        $remove = Cart::remove($rowId);
        if($remove) {
            $notification = [
            'message'   =>'Product Removed Successfully',
            'alert-type'=> 'success'
            ];
            return redirect()->back()->with($notification);
        }else {
            $notification = [
                'message'   =>'Something goes wrong!',
                'alert-type'=> 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }

    public function createInvoice(Request $request){
        $this->validate($request, [
            'customer_id' => 'required'
        ],
        [   'customer_id.required' => 'Please Select A Customer First'
        ]);

        $cus_id = $request->customer_id;
        $customer = Customer::where('id', $cus_id)->first();
        $contents = Cart::content();
        return view('pos.invoice', compact('customer', 'contents'));
    }

    public function finalInvoice(Request $request){
        $data=array();
        $data['customer_id']    =$request->customer_id;
        $data['order_date']     =$request->order_date;
        $data['order_status']   =$request->order_status;
        $data['total_products'] =$request->total_products;
        $data['sub_total']      =$request->sub_total;
        $data['vat']            =$request->vat;
        $data['total']          =$request->total;
        $data['payment_status'] =$request->payment_status;
        $data['pay']            =$request->pay;
        $data['due']            =$request->due;

        $order_id = DB::table('orders')->insertGetId($data);
        $contents = Cart::content();

        $odata=array();
        foreach($contents as $content){
            $odata['order_id']  =$order_id;
            $odata['product_id']=$content->id;
            $odata['quantity']  =$content->qty;
            $odata['unitcost']  =$content->price;
            $odata['total']     =$content->total;
            $insert= OrderDetail::create($odata);
        }
        if($insert) {
            $notification = [
            'message'   =>'Invoice Created Successfully | Please deliver the product and accept status',
            'alert-type'=> 'success'
            ];
            Cart::destroy();
            return redirect()->route('pending.order')->with($notification);
        }else {
            $notification = [
                'message'   =>'Something goes wrong!',
                'alert-type'=> 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }
}
