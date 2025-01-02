<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index(){
        $inquiries = Inquiry::orderBy('created_at', 'desc')->get();
        return view('Admin.inquiries', compact('inquiries'));
    }

    public function insert(Request $request)
    {

        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'message' => 'nullable',
                'location' => 'required',
            ]);
            Inquiry::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'message' => $validatedData['message'],
                'location' => $validatedData['location'],

            ]);
            return response()->json(['success' => true, 'message' => 'Inquiry created successfully'], 200);
        } catch (\Exception $error) {
            return response()->json(['success' => false, 'message' => $error->getMessage(),], 500);
        }
    }

}
        