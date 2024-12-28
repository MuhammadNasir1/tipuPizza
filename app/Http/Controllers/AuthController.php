<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $validatedData = $request->validate([

                'email' => "required",
                'password' => "required",
            ]);

            $user = User::where('email',  $request->email)->first();
            if ($user && Hash::check($request->password, $user->password)) {

                session(['user_det' => [
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'email' => $validatedData['email'],
                ]]);
           
                return  response()->json([  
                    'message' => 'login  Successful',
                    'success' => true,
            
                ],  200);
            } else {

                return response()->json([
                    'message' => 'Wrong credentials',
                    'success' => false,
                    'status' => 'error',
                ], 401);
            }
        } catch (\Exception $eror) {

            return response()->json([
                'message' =>  'login failed',
                'success' => false,
                'error' => $eror->getMessage(),
            ], 500);
        }
    }

    public function logout(Request $request)
    {

        $request->session()->forget('user_det');
        $request->session()->regenerate();
        return redirect('/login');
    }
}
