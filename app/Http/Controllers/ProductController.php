<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::latest()->paginate(5);
        return view('products.index',compact('products'))
              ->with('i',(request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('products.store',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
        $this->validator($request->all());
        $title = $request->title;
        $file = $request->image;
        $description = $request->short_description;
        $full = $request->full_description;
        $category_id = $request->category_id;
        $file_name = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('storage'), $file_name);
        $values = [
        'title'=> $title,
        'image'=> $file_name,
        'short_description' => $description,
        'full_description' => $full,
        'category_id'=> $category_id
        ];
        Product::create($values);

        return redirect()->route('products.index')->with('success','Успешно добавлено!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        $categories = Category::all();
        return view('products.edit',compact('product','categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        $this->validator($request->all());
        $title = $request->title;
        $file = $request->image;
        $description = $request->short_description;
        $full = $request->full_description;
        $category_id = $request->category_id;
        $file_name = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('storage'), $file_name);
        $values = [
            'title'=> $title,
            'image'=> $file_name,
            'short_description' => $description,
            'full_description' => $full,
            'category_id' => $category_id 
        ];
        $product->update($values);
        return redirect()->route('products.index')->with('success','Успешно редактировано!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect()->route('products.index')->with('success','Удалено!');
    }

    public function validator(array $data) {

        return Validator::make($data,[
        'title' => 'required',
        'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg',
        'short_description' => 'required',
        'full_description' => 'required',
        'category_id' => 'required|exists:categories,id'
    ]);
}

}
