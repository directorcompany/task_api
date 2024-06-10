<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $pages = Page::latest()->paginate(5);
        return view('pages.index',compact('pages'))
              ->with('i',(request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {

        return view('pages.store');
    }

      /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title = $request->title;
        $description = $request->short_description;
        $full = $request->full_description;
        $values = [
            'title'=> $title,
            'short_description' => $description,
            'full_description' => $full 
        ];
        $this->validator($values);
        Page::create($values);


        return redirect()->route('pages.index')->with('success','Успешно добавлено!');
    }

     /**
     * Display the specified resource.
     */
    public function show(Page $page) {
        return view('pages.show',compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page) {
        return view('pages.edit',compact('page'));
    }

      /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $title = $request->title;
        $description = $request->short_description;
        $full = $request->full_description;
        $values = [
            'title' => $title,
            'short_description' => $description,
            'full_description' => $full
        ];
        $this->validator($values);
        $page->update($values);
        
        return redirect()->route('pages.index')->with('success','Успешно редактировано!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {

        $page->delete();

        return redirect()->route('pages.index')->with('success','Удалено!');
    }
    public function validator(array $data) {
         return Validator::make($data,[
                'title' => 'required',
                'short_description' => 'required',
                'full_description' => 'required',
            ]);
        }
}
