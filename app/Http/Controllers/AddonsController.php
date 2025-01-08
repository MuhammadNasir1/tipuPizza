<?php

namespace App\Http\Controllers;

use App\Models\Addons;
use Illuminate\Http\Request;

class AddonsController extends Controller
{

    public function index()
    {
        $addons = Addons::where('addon_status', 1)->get();

        return view('Admin.addons', compact('addons'));
    }
    public function insert(Request $request)
    {

        try {
            $validatedData = $request->validate([
                'addon_name' => 'required',
                'addon_price' => 'required',

            ]);

            Addons::create([
                'addon_name' => $validatedData['addon_name'],
                'addon_price' => $validatedData['addon_price'],

            ]);

            return response()->json(['success' => true, 'message' => "Addon add successfully"], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'addon_name' => 'required',
                'addon_price' => 'required',

            ]);

            $Addons = Addons::findOrFail($id);

            $Addons->update([
                'addon_name' => $validatedData['addon_name'],
                'addon_price' => $validatedData['addon_price'],

            ]);

            return response()->json(['success' => true, 'message' => "Addon update successfully"], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function delete(Request $request, $id)
    {
        try {

            $Addons = Addons::findOrFail($id);

            $Addons->update([
                'addon_status' => 0,
            ]);

            return response()->json(['success' => true, 'message' => "Addon delete successfully"], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
