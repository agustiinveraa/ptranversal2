@extends('layouts.app')
@vite('resources/js/auth/validateLogin.js')
@section('login')

<main class="container max-w-screen-xl mx-auto flex flex-col my-20 gap-10 min-h-screen">
    <div class="flex flex-col gap-2 w-full max-w-md mx-auto p-6 rounded-md bg-light">
        <h2 class="text-4xl font-bold mb-6">Iniciar sesión</h2>
        <p class=" font-semibold text-xl">¡Hola de nuevo! 👋 <br> Ingresa tus datos para iniciar sesión</p>
        <form method="POST" id="loginForm" class="space-y-4" action="{{ route('loginUser') }}">
            @csrf

            <div>
              <label for="email" class="input input-bordered flex items-center gap-2">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 16 16"
                  fill="currentColor"
                  class="h-4 w-4 opacity-70">
                  <path
                    d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                  <path
                    d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                </svg>
                <input type="email" id="email" name="email" class="grow" placeholder="Email" />
              </label>
            </div>

            <div>
              <label for="password" class="input input-bordered flex items-center gap-2">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 16 16"
                  fill="currentColor"
                  class="h-4 w-4 opacity-70">
                  <path
                    fill-rule="evenodd"
                    d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                    clip-rule="evenodd" />
                </svg>
                <input type="password" id="password" name="password" class="grow" value="password" />
              </label>
                
            </div>
            

            <div class="flex flex-col gap-4">
                <button type="submit" class="w-full btn btn-primary">Iniciar sesión</button>
                <a href="{{ route('register') }}" class="text-sm self-center">¿No tienes una cuenta? Regístrate</a>
            </div>
        </form>
    </div>
</main>

@endsection