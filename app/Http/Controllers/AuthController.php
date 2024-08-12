<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = request()->validate([
            "name" => "required|max:255",
            "email" => "required|email|unique:users",
            "password" => "required|confirmed",
        ]);

        $user = User::create($fields);

        return $user;
    }
    public function login(Request $request)
    {
        $fields = request()->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        $user = User::where("email", $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return [
                'message' => 'The provided credentials are incorrect.'
            ];
        }

        $token = $user->createToken($user->name)->plainTextToken;

        return [
            'user' => $user,
            'token' => $token
        ];
    }
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return [
            'message' => 'You are logged out.'
        ];
    }
}
