<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    // Register user
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return $this->respondWithToken($user);
    }

    // Login user
    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return $this->errorResponse('Invalid credentials', 401);
        }

        return $this->respondWithToken($user);
    }

    // Logout user
   public function logout(Request $request)
{
    if (!$request->user()) {
        return $this->errorResponse('Invalid token', 401);
    }

    $request->user()->currentAccessToken()->delete();

    return $this->successResponse('Logged out');
}

    // --- Helpers ---

    private function respondWithToken(User $user)
    {
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'user'  => $user,
            'token' => $token
        ]);
    }

    private function successResponse($message, $status = 200)
    {
        return response()->json(['message' => $message], $status);
    }

    private function errorResponse($message, $status = 400)
    {
        return response()->json(['message' => $message], $status);
    }
}
