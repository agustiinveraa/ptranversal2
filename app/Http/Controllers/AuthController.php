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
     * Handle user login
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        try {
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

            if (!Auth::user()->hasVerifiedEmail()) {
                return response()->json([
                    'errors' => [
                        'email' => ['El correu electrònic no ha sido verificado.']
                    ]
                ], 422);
            }

            $user = Auth::user();
            

            
            return response()->json([
                'success' => true, 
                'redirect' => route('home'),
                'user' => $user
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Server error'], 500);
        }
    }

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

        $user->sendEmailVerificationNotification();

        return response()->json(['success' => true, 'message' => 'S ha enviat un correu de verificació. Si us plau, verifiqueu el vostre correu electrònic per completar el registre.']);
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

    /**
     * Verifica el correu electrònic de l'usuari
     */
    public function verifyEmail(Request $request, $id, $hash)
    {
        $user = User::findOrFail($id);

        if (!hash_equals($hash, sha1($user->getEmailForVerification()))) {
            return response()->json(['error' => 'El token de verificació no és vàlid.'], 400);
        }

        if ($user->hasVerifiedEmail()) {
            return response()->json(['message' => 'El correu electrònic ja està verificat.'], 200);
        }

        $user->markEmailAsVerified();

        return response()->json(['message' => 'Correu electrònic verificat correctament.'], 200);
    }
}