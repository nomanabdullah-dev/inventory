<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        'name'      => 'required'
        ]);
        category::create([
            'name'  => $request->name
        ]);
        $notification  = [
            'message'=>'Category Created Successfully!',
            'alert-type'=> 'success'
        ];
        return redirect()->route('category.index')->with($notification);
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'      => 'required'
        ]);
        Category::where('id', $id)->update([
            'name'  => $request->name
        ]);
        $notification  = [
            'message'=>'Category Updated Successfully!',
            'alert-type'=> 'success'
        ];
        return redirect()->route('category.index')->with($notification);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        $notification  = [
        'message'=>'Category Deleted Successfully!',
        'alert-type'=> 'success'
        ];
        return redirect()->route('category.index')->with($notification);
    }
}
