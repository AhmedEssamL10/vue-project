<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use App\Models\ShipRequest;
use Illuminate\Http\Request;
use App\Models\FactorRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function index(Request $request): View
    {
        $user = User::findOrFail(Auth::id());
        $requests = ShipRequest::where('user_id', $user->id)->get();
        $factorRequests = FactorRequest::where('user_id', $user->id)->get();
        return view('profile.edit', compact('user', 'requests', 'factorRequests'));
    }
    public function getChangePassword(Request $request): View
    {
        return view('profile.password-update');
    }

    public function postChangePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed', // must include new_password_confirmation
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Current password is incorrect.',
            ], 422);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();
        Auth::logout();
        $redirectUrl = route('auth.login', ['locale' => session('locale') ?? app()->getLocale()]);

        return response()->json([
            'status' => 'success',
            'redirect_url' => $redirectUrl,
            'isSuccess' => true
        ], 200);
    }
}
