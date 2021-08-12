<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        'name'      => 'required',
        'address'   => 'required',
        ]);
        $data=array();
        $data['name']           = $request->name;
        $data['email']          = $request->email;
        $data['phone' ]         = $request->phone;
        $data['address']        = $request->address;
        $data['shop_name']      = $request->shop_name;
        $data['bank_name']      = $request->bank_name;
        $data['bank_branch']    = $request->bank_branch;
        $data['account_holder'] = $request->account_holder;
        $data['account_number'] = $request->account_number;
        $data['city']           = $request->city;

        if($request->file('photo')) {
            $image             = $request->file('photo');
            $ext               = strtolower($image->getClientOriginalExtension());
            $path              = 'images/customer/';
            $img_name          = time().'-'.rand(100,999).'.'.$ext;
            $img_url           = $path.$img_name;
            $moved             = $image->move($path,$img_name);
            if($moved) {
                $data['photo'] = $img_url;
                Customer::create($data);
                $notification  = [
                    'message'=>'Customer Created Successfully!',
                    'alert-type'=> 'success'
                ];
                return redirect()->back()->with($notification);
            }
        }else {
            Customer::create($data);
            $notification  = [
                'message'=>'Customer Created Successfully!',
                'alert-type'=> 'success'
            ];
            return redirect()->back()->with($notification);
        }

    }

    public function show(Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'      => 'required',
            'address'   => 'required',
            ]);
            $data=array();
            $data['name']           = $request->name;
            $data['email']          = $request->email;
            $data['phone' ]         = $request->phone;
            $data['address']        = $request->address;
            $data['shop_name']      = $request->shop_name;
            $data['bank_name']      = $request->bank_name;
            $data['bank_branch']    = $request->bank_branch;
            $data['account_holder'] = $request->account_holder;
            $data['account_number'] = $request->account_number;
            $data['city']           = $request->city;

        if($request->file('photo')) {
            $image             = $request->file('photo');
            $ext               = strtolower($image->getClientOriginalExtension());
            $path              = 'images/customer/';
            $img_name          = time().'-'.rand(100,999).'.'.$ext;
            $img_url           = $path.$img_name;
            $moved             = $image->move($path,$img_name);
            if($moved) {
                $data['photo'] = $img_url;
                $customer      = Customer::where('id', $id)->first();
                $old_photo     = $customer->photo;
                $old_photo_rmv = unlink($old_photo);
                if($old_photo_rmv) {
                    Customer::where('id', $id)->update($data);
                    $notification  = [
                        'message'=>'Customer Updated Successfully!',
                        'alert-type'=> 'success'
                    ];
                    return redirect()->route('customer.index')->with($notification);
                }
            }
        }else {
            Customer::where('id', $id)->update($data);
            $notification  = [
                'message'=>'Customer Updated Successfully!',
                'alert-type'=> 'success'
            ];
            return redirect()->route('customer.index')->with($notification);
        }
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $photo_unlink = unlink($customer->photo);
        if($photo_unlink) {
            $customer->delete();
            $notification  = [
            'message'=>'Customer Deleted Successfully!',
            'alert-type'=> 'success'
            ];
            return redirect()->route('customer.index')->with($notification);
        }else {
            $notification  = [
                'message'=>'Something goes wrong!',
                'alert-type'=> 'error'
            ];
            return redirect()->route('customer.index')->with($notification);
        }
    }
}
