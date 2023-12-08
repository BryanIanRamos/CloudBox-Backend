<?php

namespace App\Http\Controllers;

use App\Http\Requests\User_request;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Authentication_controller extends Controller
{
    /**
     * Login using the specified resource.
     */
    public function login(User_request $request)
    {


        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $response = [
            'user'  => $user,
            'token' => $user->createToken($request->email)->plainTextToken
        ];

        return $response;
    }

    /**
     * Logout using the specified resource.
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        $response = [
            'message' => 'logout.'
        ];

        return $response;
    }
}
