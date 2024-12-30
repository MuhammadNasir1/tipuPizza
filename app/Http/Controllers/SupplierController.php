<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        $suppliers = Supplier::orderBy('created_at', 'desc')->get();
        return view('Admin.suppliers', compact('suppliers'));
    }


    public function insert(Request $request)
    {

        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'message' => 'nullable',
            ]);
            Supplier::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'message' => $validatedData['message'],

            ]);
            return response()->json(['success' => true, 'message' => 'Supplier created successfully',], 200);
        } catch (\Exception $error) {
            return response()->json(['success' => false, 'message' => $error->getMessage(),], 500);
        }
    }
}
