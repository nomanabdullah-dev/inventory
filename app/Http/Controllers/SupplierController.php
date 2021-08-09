<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        'name'      => 'required',
        'address'   => 'required',
        'type'      => 'required',
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
        $data['type']           = $request->type;

        if($request->file('photo')) {
            $image             = $request->file('photo');
            $ext               = strtolower($image->getClientOriginalExtension());
            $path              = 'images/supplier/';
            $img_name          = time().'-'.rand(100,999).'.'.$ext;
            $img_url           = $path.$img_name;
            $moved             = $image->move($path,$img_name);
            if($moved) {
                $data['photo'] = $img_url;
                Supplier::create($data);
                $notification  = [
                    'message'=>'Supplier Created Successfully!',
                    'alert-type'=> 'success'
                ];
                return redirect()->route('supplier.index')->with($notification);
            }
        }else {
            Supplier::create($data);
            $notification  = [
                'message'=>'Supplier Created Successfully!',
                'alert-type'=> 'success'
            ];
            return redirect()->route('supplier.index')->with($notification);
        }

    }

    public function show(Supplier $supplier)
    {
        return view('supplier.show', compact('supplier'));
    }

    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'      => 'required',
            'address'   => 'required',
            'type'      => 'required',
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
            $data['type']           = $request->type;

        if($request->file('photo')) {
            $image             = $request->file('photo');
            $ext               = strtolower($image->getClientOriginalExtension());
            $path              = 'images/supplier/';
            $img_name          = time().'-'.rand(100,999).'.'.$ext;
            $img_url           = $path.$img_name;
            $moved             = $image->move($path,$img_name);
            if($moved) {
                $data['photo'] = $img_url;
                $supplier      = Supplier::where('id', $id)->first();
                $old_photo     = $supplier->photo;
                $old_photo_rmv = unlink($old_photo);
                if($old_photo_rmv) {
                    Supplier::where('id', $id)->update($data);
                    $notification  = [
                        'message'=>'Supplier Updated Successfully!',
                        'alert-type'=> 'success'
                    ];
                    return redirect()->route('supplier.index')->with($notification);
                }
            }
        }else {
            supplier::where('id', $id)->update($data);
            $notification  = [
                'message'=>'Supplier Updated Successfully!',
                'alert-type'=> 'success'
            ];
            return redirect()->route('supplier.index')->with($notification);
        }
    }

    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $photo_unlink = unlink($supplier->photo);
        if($photo_unlink) {
            $supplier->delete();
            $notification  = [
            'message'=>'Supplier Deleted Successfully!',
            'alert-type'=> 'success'
            ];
            return redirect()->route('supplier.index')->with($notification);
        }else {
            $notification  = [
                'message'=>'Something goes wrong!',
                'alert-type'=> 'error'
            ];
            return redirect()->route('supplier.index')->with($notification);
        }
    }
}
