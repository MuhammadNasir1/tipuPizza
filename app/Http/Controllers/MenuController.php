<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {

        $categories = Categories::select('category_id', 'category_name')->where('category_status', 1)->get();
        $menu = Menu::with('category')->where('menu_status', 1)->get();
        // $menu = Menu::with('category')->where('menu_status' , 1)->get();
        // return response()->json($menu);
        return view('Admin/menu', compact('categories', 'menu'));
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
            return response()->json(['success' => true,  'message' => 'Menu added successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false,  'message' => $e->getMessage()], 400);
        }
    }



    public function update(Request $request, $id)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'menu_name' => 'required',
                'category_id' => 'required',
                'menu_img' => 'nullable|image',
                'menu_description' => 'nullable',
                'menu_s_price' => 'nullable|numeric',
                'menu_l_price' => 'nullable|numeric',
            ]);

            // Find the menu item by ID
            $menu = Menu::findOrFail($id);

            // Check if a new image is uploaded
            if ($request->hasFile('menu_img')) {
                // Delete the old image if it exists
                if ($menu->menu_img && file_exists(public_path($menu->menu_img))) {
                    unlink(public_path($menu->menu_img));
                }

                // Store the new image
                $image = $request->file('menu_img');
                $imagePath = $image->store('menu_images', 'public');
                $imageFullPath = 'storage/' . $imagePath;
            } else {
                // If no new image, retain the current imagela
                $imageFullPath = $menu->menu_img;
            }

            // Update the menu item data
            $menu->update([
                'menu_name' => $validatedData['menu_name'],
                'category_id' => $validatedData['category_id'],
                'menu_img' => $imageFullPath,
                'menu_description' => $validatedData['menu_description'],
                'menu_s_price' => $validatedData['menu_s_price'],
                'menu_l_price' => $validatedData['menu_l_price'],
            ]);

            return response()->json(['success' => true, 'message' => 'Menu updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }


    public function home()
    {
        $categories = Categories::select('category_id', 'category_name', 'category_description', 'category_img')->where('category_status', 1)->get()->map(function ($category) {
            // Fetch all menu items for the current category
            $menuItems = Menu::where('category_id', $category->category_id)
                ->where('menu_status', 1)
                ->get()
                ->map(function ($menu) {
                    return [
                        'menu_id' => $menu->menu_id,
                        'menu_name' => $menu->menu_name,
                        'menu_img' => $menu->menu_img,

                        'prices' => [
                            'small' => $menu->menu_s_price,
                            'large' => $menu->menu_l_price,
                        ],
                        'description' => $menu->menu_description,
                    ];
                });

            return [
                'id' => $category->category_id,
                'category_name' => $category->category_name,
                'category_img' => $category->category_img,
                'category_description' => $category->category_description,
                'items' => $menuItems,
            ];
        });

        // return response()->json($categories);
        return view('User.home', compact('categories'));
    }
    public function userData()
    {
        $categories = Categories::select('category_id', 'category_name', 'category_description', 'category_img')->where('category_status', 1)->get()->map(function ($category) {
            // Fetch all menu items for the current category
            $menuItems = Menu::where('category_id', $category->category_id)
                ->where('menu_status', 1)
                ->get()
                ->map(function ($menu) {
                    return [
                        'menu_id' => $menu->menu_id,
                        'menu_name' => $menu->menu_name,
                        'menu_img' => $menu->menu_img,
                        'prices' => [
                            'small' => $menu->menu_s_price,
                            'large' => $menu->menu_l_price,
                        ],
                        'description' => $menu->menu_description,
                    ];
                });

            return [
                'id' => $category->category_id,
                'category_name' => $category->category_name,
                'category_img' => $category->category_img,

                'category_description' => $category->category_description,
                'items' => $menuItems,
            ];
        });

        // return response()->json($categories);
        return view('User.menu', compact('categories'));
    }


    public function delete($id)
    {
        try {
            $category = Menu::findOr($id);
            $category->menu_status = 0;
            $category->save();
            return response()->json(['success' => true, 'message' => 'Menu delete successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
