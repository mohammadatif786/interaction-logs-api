<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthFormRequest;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(AuthFormRequest $request)
    {
        //validate input
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'message' => 'User created successfully',
            'token' => $token,
            'user' => $user,
        ], 201);
    }

    public function login(AuthFormRequest $request)
    {
        $validated = $request->validated();

        $user = User::where('email', $validated['email'])->first();

        if (! $user || ! Hash::check($validated['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect'],
            ]);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'message' => 'login successfully',
            'token' => $token,
            'user' => $user,
        ], 200);
    }
}
