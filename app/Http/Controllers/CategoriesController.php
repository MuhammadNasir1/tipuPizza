<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::where('category_status', 1)->get();
        return view('Admin/category', compact('categories'));
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
            return response()->json(['success' => true, 'message' => 'Category added successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'category_name' => 'required',
                'category_img' => 'nullable|image',
                'category_description' => 'nullable',
            ]);

            // Find the category by ID
            $category = Categories::findOrFail($id);

            // Check if a new image is uploaded
            if ($request->hasFile('category_img')) {
                if ($category->category_img && file_exists(public_path($category->category_img))) {
                    unlink(public_path($category->category_img));
                }

                // Store the new image
                $image = $request->file('category_img');
                $imagePath = $image->store('category_images', 'public');
                $imageFullPath = 'storage/' . $imagePath;
            } else {
                // If no new image, retain the current image
                $imageFullPath = $category->category_img;
            }

            // Update the category data
            $category->update([
                'category_name' => $validatedData['category_name'],
                'category_img' => $imageFullPath,
                'category_description' => $validatedData['category_description'],
            ]);

            return response()->json(['success' => true, 'message' => 'Category updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function delete($id)
    {
        try {
            $category = Categories::findOrFail($id);
            $category->category_status = 0;
            $category->save();
            return response()->json(['success' => true, 'message' => 'Category delete successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
