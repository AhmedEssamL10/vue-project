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
        // Common validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'phone' => 'required|string|max:15',
            'user_type' => 'required|in:client,worker',
        ];

        // Additional rules if the user is a worker
        if ($request->user_type === 'worker') {
            $rules = array_merge($rules, [
                'last_name' => 'required|string|max:255',
                'birthDay' => 'required|date',
                'address' => 'required|string|max:255',
                // 'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
                // 'otherDocs' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
                'whenToStart' => 'required|string',
                'whyWorkWithUs' => 'required|string',
            ]);
        }

        // Validate request
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Handle file uploads if worker
        $cvPath = null;
        $otherDocsPath = null;

        if ($request->user_type === 'worker') {
            if ($request->hasFile('cv')) {
                $cvPath = $request->file('cv')->store('cvs', 'public');
            }
            if ($request->hasFile('otherDocs')) {
                $otherDocsPath = $request->file('otherDocs')->store('documents', 'public');
            }
        }

        // Create user
        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name ?? null,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'user_type' => $request->user_type,
            'client_type' => $request->type ?? null,
            'birthDay' => $request->birthDay ?? null,
            'address' => $request->address ?? null,
            'cv' =>  $request->cv ?? null,
            'otherDocs' => $request->otherDocs ?? null,
            'whenToStart' => $request->whenToStart ?? null,
            'whyWorkWithUs' => $request->whyWorkWithUs ?? null,
        ]);

        // Auto login
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
