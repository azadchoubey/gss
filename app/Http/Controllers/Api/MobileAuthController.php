<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

class MobileAuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string', // This can be email or mobile
            'password' => 'nullable|string', // Optional password
            'login' => 'required|boolean',   // true if Firebase auth was successful
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Check if username is email or mobile
        $field = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';

           $user = User::where($field, $request->username)
                    ->where('role_id', 3)
                    ->where('status',1)
                    ->first();
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // If password is provided, verify it
        if ($request->password) {
            if (!Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    'password' => ['The provided credentials are incorrect.'],
                ]);
            }
            // Delete previous tokens and create new one only if password authentication is successful
            $user->tokens()->delete();
            $token = $user->createToken('mobile-app')->plainTextToken;
        } 
        // If login is true (Firebase auth was successful)
        elseif ($request->login) {
            // Delete previous tokens and create new one
            $user->tokens()->delete();
            $token = $user->createToken('mobile-app')->plainTextToken;
        } 
        // If just checking user existence (login=false, no password)
        else {
            return response()->json([
                'message' => 'User found',
                'user' => $user->only(['id', 'name', 'email', 'mobile'])
            ], 200);
        }

        return response()->json([
            'token' => $token,
            'user' => $user->only(['id', 'name', 'email', 'mobile'])
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }

}
