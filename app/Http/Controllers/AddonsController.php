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
                'addon_type' => 'required',

            ]);

            Addons::create([
                'addon_name' => $validatedData['addon_name'],
                'addon_price' => $validatedData['addon_price'],
                'addon_type' => $validatedData['addon_type'],

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
                'addon_type' => 'required',

            ]);

            $Addons = Addons::findOrFail($id);

            $Addons->update([
                'addon_name' => $validatedData['addon_name'],
                'addon_price' => $validatedData['addon_price'],
                'addon_type' => $validatedData['addon_type'],

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

    public function getAddons(Request $request){
        $addonsId = $request->input('addonsId'); // Example: "1,2"
        $selectiveId = $request->input('selectiveId'); // Example: "1,2"
        $addonsIdArray = explode(',', $addonsId); // Convert string to array
        $selectedIdArray = explode(',', $selectiveId); // Convert string to array

        $addons = Addons::whereIn('addon_id', $addonsIdArray)->get();
        $selectedItems = Addons::whereIn('addon_id', $selectedIdArray)->get();

        return response()->json([ 'addons'=> $addons , 'selectedItem' => $selectedItems]);
    }
}
