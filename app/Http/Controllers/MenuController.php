<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {

        $categories = Categories::select('category_id' , 'category_name')->where('category_status', 1)->get();
        $menu = Menu::with('category')->where('menu_status' , 1)->get();
        // $menu = Menu::with('category')->where('menu_status' , 1)->get();
        // return response()->json($menu);
        return view('Admin/menu' , compact('categories' , 'menu'));
    }

    public function insert(Request $request)
    {
        try {
            $validatedData = $request->validate([

                'menu_name' => 'required',
                'category_id' => 'required',
                'menu_img' => 'nullable|image',
                'menu_description' => 'nullable',
                'menu_s_price' => 'nullable',
                'menu_l_price' => 'nullable',
            ]);
            if ($request->hasFile('menu_img')) {
                $image = $request->file('menu_img');
                $imagePath = $image->store('menu_images', 'public');
                $imageFullPath = 'storage/' . $imagePath;
            } else {
                $imageFullPath = null;
            }
            $Menu = Menu::create([
                'menu_name' => $validatedData['menu_name'],
                'category_id' => $validatedData['category_id'],
                'menu_img' => $imageFullPath,
                'menu_description' => $validatedData['menu_description'],
                'menu_s_price' => $validatedData['menu_s_price'],
                'menu_l_price' => $validatedData['menu_l_price'],
            ]);
            //    $category->save();
            return response()->json(['status' => 'success', 'message' => 'Menu added successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
        }
    }
}
