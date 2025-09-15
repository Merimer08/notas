<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // POST /api/register
    public function register(Request $request)
    {
        $data = $request->validate([
            'name'                  => ['required','string','max:255'],
            'email'                 => ['required','email','max:255','unique:users,email'],
            'password'              => ['required','string','min:8','confirmed'], // requiere password_confirmation
        ]);

        // Tu User tiene 'password' => 'hashed' en casts, así que NO uses bcrypt aquí
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => $data['password'], // se hashea por el cast
        ]);

        $token = $user->createToken('api')->plainTextToken;

        return response()->json(['user' => $user, 'token' => $token], 201);
    }

    // POST /api/login  (acepta email o nombre en el mismo campo "email")
    public function login(Request $request)
    {
        $data = $request->validate([
            'email'    => ['required','string'], // puede venir email o username
            'password' => ['required','string'],
        ]);

        $cred = $data['email'];
        $user = User::where('email', $cred)->orWhere('name', $cred)->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Credenciales incorrectas.'],
            ]);
        }

        $token = $user->createToken('api')->plainTextToken;

        return response()->json(['user' => $user, 'token' => $token]);
    }

    // POST /api/logout (Bearer token)
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()?->delete();
        return response()->noContent();
    }
}
