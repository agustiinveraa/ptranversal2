<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Comprova si l'usuari està autenticat i és client
        if (Auth::check() && Auth::user()->role === 'client') {
            // Verifica si l'usuari intenta accedir al seu propi perfil
            $userId = $request->route('user');
            if ($userId && $userId != Auth::id()) {
                return redirect()->route('home')
                    ->with('error', 'Només pots accedir al teu propi perfil');
            }
            return $next($request);
        }
        
        // Redirigeix a la pàgina d'inici de sessió si no està autenticat
        return redirect()->route('login')
            ->with('error', 'Has d\'iniciar sessió per accedir a aquesta secció');
    }
}