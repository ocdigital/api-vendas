<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthResquest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    public function auth(AuthResquest $request)
    {
        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password))
        {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user->tokens()->delete();

        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json(['token' => $token]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Tokens Revogados']);
    }

    public function me(Request $request)
    {
        return $request->user();
    }
}
