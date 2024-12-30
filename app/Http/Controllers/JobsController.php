<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;

class JobsController extends Controller
{

    public function index(){
        $jobs = Jobs::orderBy('created_at', 'desc')->get();
        return view('Admin.jobs', compact('jobs'));
    }

    public function insert(Request $request)
    {

        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'job_role' => 'required',
                'job_description' => 'nullable',
            ]);
            Jobs::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'job_role' => $validatedData['job_role'],
                'job_description' => $validatedData['job_description'],

            ]);
            return response()->json(['success' => true, 'message' => 'Job created successfully',], 200);
        } catch (\Exception $error) {
            return response()->json(['success' => false, 'message' => $error->getMessage(),], 500);
        }
    }
}
