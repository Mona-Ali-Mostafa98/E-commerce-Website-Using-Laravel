<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return view('admin.products.index', [
            // 'products' => Product::all(),
            'products' =>Product::select('id','image','name' ,'price','quantity','created_at')->orderBy('created_at', 'desc')->simplePaginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.products.create' , [
            'categories'=> Category::all() ,
            'product'=> new Product() ,  //use in case of creating new product there is now data about product
        ]);
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create( $request->all());
        // dd($request->all());
        return redirect()->route('admin.products.index')
         ->with('success' , "Product '$product->name' Created Successfully");
    }


    public function show($id)
    {
        return view('admin.products.show' , [
            'categories'=> Category::all() ,
            'product'=> Product::findOrFail($id),
        ]);
    }

    public function edit($id)
    {
        return view('admin.products.edit' , [
            'categories'=> Category::all() ,
            'product'=> Product::findOrFail($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('admin.products.index')
        ->with('success' , "Product '$product->name' Updated Successfully");

    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products.index')
         ->with('success' , "Product '$product->name' Deleted Successfully");
    }
}