<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Comprova si l'usuari està autenticat i és administrador
        if (Auth::check() && Auth::user()->admin == 1) {
            return $next($request);
        }
        
        // Redirigeix a la pàgina d'inici si no és administrador
        return redirect()->route('home')->with('error', 'No tens permís per accedir a aquesta secció');
    }
}