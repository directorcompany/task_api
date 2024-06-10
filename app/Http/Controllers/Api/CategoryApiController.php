<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class CategoryApiController extends Controller
{
    public function index()
    {
       return Category::all();
    }

    public function show(Category $category)
    {
        if (is_null($category)) {
            return $this->sendError('Категория не найдено.');
        }

        return $category;
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'short_description' => 'required',
            'full_description' => 'required',
        ]);

        $imagePath = Storage::putFile('public', $request->file('image'));
        $imageUrl = Storage::url($imagePath);
    
        $category = Category::create([
            'title' => $request->title,
            'image' => $imageUrl,
            'short_description' => $request->short_description,
            'full_description' => $request->full_description,
        ]);
    
        return response()->json($category, 201);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'short_description' => 'required',
            'full_description' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = Storage::putFile('public', $request->file('image'));
            $imageUrl = Storage::url($imagePath);
            $category->image = $imageUrl;
        }
    
        $category->update($request->only(['title', 'short_description', 'full_description']));
    
        return response()->json($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json(null, 204);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}