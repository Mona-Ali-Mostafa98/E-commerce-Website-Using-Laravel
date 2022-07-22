<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnValue;

class CategoryController extends Controller
{
    public function index()
    {
        $request = request();
        $filters = $request->query();

        $categories = Category::with('parent')
            ->when($request->query('name'), function($query, $name) {
                $query->where('categories.name', 'LIKE', '%' . $name . '%');
            })
            ->simplePaginate();
        // $categories = Category::all();
        // $categories = Category::select('id', 'name' , 'parent_id' , 'created_at')->get();
        // $categories = Category::with('parent')->get();
        return view('admin.categories.index' , [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $category = new Category() ;
        $categories = Category::all();
        return view('admin.categories.create' , [
            'categories' => $categories ,
            'category' => $category , //to use this variable in form

        ]);
    }

    public function store(CategoryRequest $request)
    {
        $category = Category::create( $request->all());
        // dd($request->all());
        return redirect()->route('admin.categories.index')
         ->with('success' , "Category '$category->name' Created Successfully");
    }


    public function show($id)
    {
        $category = Category::findOrFail($id);
        // $categories = Category::all();
        // $products = Product::where('category_id' , $id)->get();
        $products=$category->products()->simplePaginate(5);       //use relation to get all products belong to this category
        return view('admin.categories.show' , [
            'category'=> $category ,
            // 'categories' => $categories ,
            'products' => $products ,
        ]);
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        // $categories = Category::all();
        //add query to prevent current category and his children show in field of parent_id edit form
        $categories = Category::where('id' , '!=' , $id)
            ->where(function($query) use ($id){
                $query->where('parent_id' , '<>' , $id)
                ->orWhereNull('parent_id');
            })
            ->get();
        return view('admin.categories.edit' , [
            'category' => $category ,
            'categories' => $categories
        ]);
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('admin.categories.index')
        ->with('success' , "Category '$category->name' Updated Successfully");

    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.categories.index')
        ->with('success' , "Category '$category->name' Deleted Successfully");
    }
}
