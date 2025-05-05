<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Registra un nuevo usuario
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullName' => 'required|string|max:255',
            'birthDate' => 'required|date',
            'phone' => 'required|string|max:15',
            'shippingAddress' => 'required|string|max:255',
            'billingAddress' => 'required|string|max:255',
            'preferredMaterial' => 'nullable|string|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'name' => explode(' ', $request->fullName)[0], // Usamos el primer nombre como 'name'
            'fullName' => $request->fullName,
            'birthDate' => $request->birthDate,
            'phone' => $request->phone,
            'shippingAddress' => $request->shippingAddress,
            'billingAddress' => $request->billingAddress,
            'preferredMaterial' => $request->preferredMaterial,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return response()->json(['success' => true, 'redirect' => route('home')]);
    }

    /**
     * Inicia sesión de un usuario
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'errors' => [
                    'email' => ['Las credenciales proporcionadas son incorrectas.']
                ]
            ], 422);
        }

        return response()->json(['success' => true, 'redirect' => route('home')]);
    }

    /**
     * Cierra la sesión del usuario
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}