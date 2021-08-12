<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $suppliers  = Supplier::all();
        return view('product.create', compact('categories', 'suppliers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        'name'          => 'required',
        'category_id'   => 'required',
        'supplier_id'   => 'required',
        'code'          => 'required',
        'garage'        => 'required',
        'route'         => 'required',
        'photo'         => 'required|mimes:jpg,jpeg,png',
        'buy_date'      => 'required',
        'expire_date'   => 'required',
        'buying_price'  => 'required',
        'selling_price' => 'required',
        ]);
        $data=array();
        $data['name']           = $request->name;
        $data['category_id']    = $request->category_id;
        $data['supplier_id' ]   = $request->supplier_id;
        $data['code']           = $request->code;
        $data['garage']         = $request->garage;
        $data['route']          = $request->route;
        $data['buy_date']       = $request->buy_date;
        $data['expire_date']    = $request->expire_date;
        $data['buying_price']   = $request->buying_price;
        $data['selling_price']  = $request->selling_price;
        $image                  = $request->file('photo');

        if($image) {
            $ext               = strtolower($image->getClientOriginalExtension());
            $path              = 'images/product/';
            $img_name          = time().'-'.rand(100,999).'.'.$ext;
            $img_url           = $path.$img_name;
            $moved             = $image->move($path,$img_name);
            if($moved) {
                $data['photo'] = $img_url;
                Product::create($data);
                $notification  = [
                    'message'=>'Product Created Successfully!',
                    'alert-type'=> 'success'
                ];
                return redirect()->route('product.index')->with($notification);
            }
        }
    }

    public function show(Product $product)
    {
        $categories = Category::all();
        $suppliers  = Supplier::all();
        return view('product.show', compact('product','categories','suppliers'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $suppliers  = Supplier::all();
        return view('product.edit', compact('product','categories','suppliers'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'          => 'required',
            'category_id'   => 'required',
            'supplier_id'   => 'required',
            'code'          => 'required',
            'garage'        => 'required',
            'route'         => 'required',
            'buy_date'      => 'required',
            'expire_date'   => 'required',
            'buying_price'  => 'required',
            'selling_price' => 'required',
        ]);
        $data=array();
        $data['name']           = $request->name;
        $data['category_id']    = $request->category_id;
        $data['supplier_id' ]   = $request->supplier_id;
        $data['code']           = $request->code;
        $data['garage']         = $request->garage;
        $data['route']          = $request->route;
        $data['buy_date']       = $request->buy_date;
        $data['expire_date']    = $request->expire_date;
        $data['buying_price']   = $request->buying_price;
        $data['selling_price']  = $request->selling_price;
        $image                  = $request->file('photo');

        if($image) {
            $ext               = strtolower($image->getClientOriginalExtension());
            $path              = 'images/product/';
            $img_name          = time().'-'.rand(100,999).'.'.$ext;
            $img_url           = $path.$img_name;
            $moved             = $image->move($path,$img_name);
            if($moved) {
                $data['photo'] = $img_url;
                $product       = Product::where('id', $id)->first();
                $old_photo     = $product->photo;
                $old_photo_rmv = unlink($old_photo);
                if($old_photo_rmv) {
                    Product::where('id', $id)->update($data);
                    $notification  = [
                        'message'=>'Product Updated Successfully!',
                        'alert-type'=> 'success'
                    ];
                    return redirect()->route('product.index')->with($notification);
                }
            }
        }else {
            Product::where('id', $id)->update($data);
            $notification  = [
                'message'=>'Product Updated Successfully!',
                'alert-type'=> 'success'
            ];
            return redirect()->route('product.index')->with($notification);
        }
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $photo_unlink = unlink($product->photo);
        if($photo_unlink) {
            $product->delete();
            $notification  = [
            'message'=>'Product Deleted Successfully!',
            'alert-type'=> 'success'
            ];
            return redirect()->route('product.index')->with($notification);
        }else {
            $notification  = [
                'message'=>'Something goes wrong!',
                'alert-type'=> 'error'
            ];
            return redirect()->route('product.index')->with($notification);
        }
    }

    // Product Export Import
    public function productExportImport(){
        return view('product.export_import.index');
    }

    public function productExport(){
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function productImport(Request $request){
        $imported = Excel::import(new ProductsImport, $request->file('import_file'));
        if($imported) {
            $notification  = [
            'message'=>'Product Imported Successfully!',
            'alert-type'=> 'success'
            ];
            return redirect()->route('product.index')->with($notification);
        }else {
            $notification  = [
                'message'=>'Something goes wrong!',
                'alert-type'=> 'error'
            ];
            return redirect()->route('product.export.import')->with($notification);
        }
    }

}
