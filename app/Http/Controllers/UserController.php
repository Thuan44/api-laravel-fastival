<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash; // Provides secore Bcrypt hashing for storing user passwords
use Laravel\Sanctum\HasApiTokens;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'user_email' => 'required|string|unique:users,user_email', // Unique to the users table and the user_email column
            'user_password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'user_email' => $fields['user_email'],
            'user_password' => bcrypt($fields['user_password']),
        ]);

        $token = $user->createToken('appToken')->plainTextToken; // 'appToken' is the key
        
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201); // Success and creation of a resource
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete(); // Destroy all tokens

        return [
            'message' => 'Logged out'
        ];
    }
}
