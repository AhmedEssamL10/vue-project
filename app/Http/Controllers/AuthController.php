<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'phone' => 'required|string|max:15',
            'user_type' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'user_type' => $request->user_type,
            'client_type' => $request->type ?? null,
        ]);

        Auth::login($user);

        $redirectUrl = route('home', ['locale' => session('locale') ?? app()->getLocale()]);

        return response()->json([
            'status' => 'success',
            'message' => 'Registration successful!',
            'redirect_url' => $redirectUrl,
            'isSuccess' => true,
        ], 200);
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $remember = $request->has('remember'); // will be true if checkbox is checked

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            $redirectUrl = route('profile.edit', ['locale' => session('locale') ?? app()->getLocale()]);

            return response()->json([
                'status' => 'success',
                'redirect_url' => $redirectUrl,
                'isSuccess' => true
            ], 200);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'These credentials do not match our records.',
        ], 401);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $redirectUrl = route('home', ['locale' => session('locale') ?? app()->getLocale()]);

        return response()->json([
            'status' => 'success',
            'isSuccess' => true,
            'redirect_url' => $redirectUrl,
        ], 200);
    }
}
