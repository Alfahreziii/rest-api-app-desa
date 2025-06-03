<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ApiAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('web')->attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;

            return response()->json([
                'status'  => true,
                'message' => 'Login berhasil',
                'token'   => $token,
                'user'    => $user,
            ]);
        }

        return response()->json([
            'status'  => false,
            'message' => 'Email atau password salah',
        ], 401);
    }
}

