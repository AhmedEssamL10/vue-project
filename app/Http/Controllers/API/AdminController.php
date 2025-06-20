<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\ShipRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FactorRequest;

class AdminController extends Controller
{
    public function clients()
    {
        $users = User::where('user_type', 'client')->get();
        return response()->json([
            'isSuccess' => true,
            'status' => 'success',
            'data' => $users,
        ]);
    }
    public function workers()
    {
        $users = User::where('user_type', 'worker')->get();
        return response()->json([
            'isSuccess' => true,
            'status' => 'success',
            'data' => $users,
        ]);
    }
    public function user(Request $request, $id)
    {
        $user = User::findOrFail($id);
        return response()->json([
            'isSuccess' => true,
            'status' => 'success',
            'data' => $user,
        ]);
    }
    public function requests()
    {
        $shipRequests = ShipRequest::with('user')->get();
        $factorRequests = FactorRequest::with('user')->get(); // Assuming you want to fetch factor requests similarly
        return response()->json([
            'isSuccess' => true,
            'shipRequests' => $shipRequests,
            'factorRequests' => $factorRequests,
        ]);
    }
    public function shipRequest(Request $request, $id)
    {
        $shipRequest = ShipRequest::with('user')->findOrFail($id);
        return response()->json([
            'isSuccess' => true,
            'status' => 'success',
            'data' => $shipRequest,
        ]);
    }
    public function factorRequest(Request $request, $id)
    {
        $factorRequest = FactorRequest::with('user')->findOrFail($id);
        return response()->json([
            'isSuccess' => true,
            'status' => 'success',
            'data' => $factorRequest,
        ]);
    }
}
