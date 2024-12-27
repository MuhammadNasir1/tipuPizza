<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::where('category_status' , 1)->get();
        return view('Admin/category' , compact('categories'));
    }
    public function insert(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'category_name' => 'required',
                'category_img' => 'nullable|image',
                'category_description' => 'nullable',
            ]);
            if ($request->hasFile('category_img')) {
                $image = $request->file('category_img');
                $imagePath = $image->store('category_images', 'public');
                $imageFullPath = 'storage/' . $imagePath;
            } else {
                $imageFullPath = null;
            }
            $category = Categories::create([
                'category_name' => $validatedData['category_name'],
                'category_img' => $imageFullPath,
                'category_description' => $validatedData['category_description'],
            ]);
            //    $category->save();
            return response()->json(['status' => 'success', 'message' => 'Category added successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
        }
    }

    public function update(Request $request , $id){
        try {
            $validatedData = $request->validate([
                'category_name' => 'required',
                'category_img' => 'nullable|image',
                'category_description' => 'nullable',
            ]);


            if ($request->hasFile('category_img')) {
                $image = $request->file('category_img');
                $imagePath = $image->store('category_images', 'public');
                $imageFullPath = 'storage/' . $imagePath;
            } else {
                $imageFullPath = null;
            }
            $category = Categories::create([
                'category_name' => $validatedData['category_name'],
                'category_img' => $imageFullPath,
                'category_description' => $validatedData['category_description'],
            ]);
            //    $category->save();
            return response()->json(['status' => 'success', 'message' => 'Category added successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
        }

    }
}
