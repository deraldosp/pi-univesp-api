<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if(!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return response()->json([
            'data' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60,
                'user' => auth()->user()->load('unidade')
            ]
        ]);
    }

    public function logout() {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }

    protected function createNewToken($token) {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
