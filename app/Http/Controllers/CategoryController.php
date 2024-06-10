<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::latest()->paginate(5);
        return view('categories.index',compact('categories'))
              ->with('i',(request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {

        return view('categories.store');
    }

      /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validator($request->all());
        $title = $request->title;
        $file = $request->image;
        $description = $request->short_description;
        $full = $request->full_description;
        $file_name = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('storage'), $file_name);
        $values = [
        'title'=> $title,
        'image'=> $file_name,
        'short_description' => $description,
        'full_description' => $full
        ]; 
        Category::create($values);

        return redirect()->route('categories.index')->with('success','Успешно добавлено!');
    }

     /**
     * Display the specified resource.
     */
    public function show(Category $category) {
        return view('categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category) {
        return view('categories.edit',compact('category'));
    }

      /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
              
        $this->validator($request->all());
        $title = $request->title;
        $file = $request->image;
        $description = $request->short_description;
        $full = $request->full_description;
        $file_name = time() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('storage'), $file_name);
        $values = ['title'=> $title,
        'image'=> $file_name,
        'short_description' => $description,
        'full_description' => $full
    ]; 
        $category->update($values);
        
        
        return redirect()->route('categories.index')->with('success','Успешно редактировано!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {

        $category->delete();

        return redirect()->route('categories.index')->with('success','Удалено!');
    }
    public function validator(array $data) {

       return Validator::make($data,[
            'title' => 'required',
            'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg',
            'short_description' => 'required',
            'full_description' => 'required',
        ]);
    }
}