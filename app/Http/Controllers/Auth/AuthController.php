<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'email' => ['required', 'unique:users'],
            'name' => ['required'],
            'password' => ['required'],
        ]);

        User::create($fields);

        return [
            'message' => 'ok'
        ];
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'exists:users'],
            'password' => ['required'], 
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return [
                'message' => 'Неправильный логин или пароль'
            ];
        }

        $token = $user->createToken($user->name);

        return [
            'user' => $user,
            'token' => $token->plainTextToken,
        ];
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return [
            'message' => 'ok'
        ];
    }

    public function loginAdmin(Request $request)
    {
        $request->validate([
            'email' => ['required', 'exists:users'],
            'password' => ['required'], 
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return [
                'message' => 'Неправильный логин или пароль'
            ];
        }

        if (!$user->is_admin) {
                return response()->json([
                    'message' => 'Доступ запрещён. Только для администраторов.'
                ], Response::HTTP_FORBIDDEN); // 403
        }

        $token = $user->createToken($user->name);

        return response()->json([
            'user' => $user,
            'token' => $token->plainTextToken,
        ]);
    }
}
