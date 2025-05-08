@extends('layouts.app')
@vite('resources/js/auth/validateRegister.js', 'resources/js/auth/leaflet.js')
@section('register') 
<style>
    #map { height: 180px; }
</style>
<main class="container max-w-screen-xl mx-auto flex flex-col my-20 gap-10 min-h-screen  ">
    <div class="flex flex-col gap-2 w-full max-w-md mx-auto p-6 rounded-md bg-light">
        <h2 class="text-4xl font-bold mb-6 ">Crear cuenta</h2>
        <p class=" font-semibold text-xl">¡Bienvenid@! ❤ <br> Ingresa tus datos para crear tu cuenta</p>
        <form method="POST" id="registerForm" class="space-y-4" action="{{ route('registerUser') }}">
            @csrf
            <div>
                <label for="fullName" class="block text-sm font-medium ">Nombre y apellidos</label>
                <input type="text" id="fullName" name="fullName" required class="input input-bordered flex items-center gap-2 w-full" pattern="^[A-Za-zÀ-ÿ]+((\s[A-Za-zÀ-ÿ]+){1,    3})?$">
            </div>

            <div>
                <label for="birthDate" class="block text-sm font-medium  ">Fecha de nacimiento</label>
                <input type="date" id="birthDate" name="birthDate" required class="input input-bordered flex items-center gap-2 w-full">
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium  ">Número de teléfono</label>
                <input type="tel" id="phone" name="phone" required class="input input-bordered flex items-center gap-2 w-full" pattern="^\+[0-9]{1,3}[0-9]{9}$">
            </div>

            

            <div>
                <label for="shippingAddress" class="block text-sm font-medium  ">Dirección de envío</label>
                <input type="text" id="shippingAddress" name="shippingAddress" required class="input input-bordered flex items-center gap-2 w-full" oninput="search(this.value)">
            </div>

            <div id="map" class="rounded-lg border border-gray-300"></div>

            <div>
                <label for="billingAddress" class="block text-sm font-medium  ">Dirección de facturación</label>
                <input type="text" id="billingAddress" name="billingAddress" required class="input input-bordered flex items-center gap-2 w-full">
                <div class="mt-2">
                    <input type="checkbox" id="sameAsShipping" name="sameAsShipping" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <label for="sameAsShipping" class="ml-2 text-sm text-gray-600">Misma que la de envío</label>
                </div>
            </div>

            <div>
                <label for="preferredMaterial" class="block text-sm font-medium  ">Material preferido</label>
                <select id="preferredMaterial" name="preferredMaterial" class="input input-bordered flex items-center gap-2 w-full">
                    <option value="">Selecciona una opción</option>
                    <option value="plastic">Plástico</option>
                    <option value="silicone">Silicona</option>
                    <option value="leather">Cuero</option>
                </select>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium  ">Correo electrónico</label>
                <input type="email" id="email" name="email" required class="input input-bordered flex items-center gap-2 w-full">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium  ">Contraseña</label>
                <input type="password" id="password" name="password" minlength="8" required class="input input-bordered flex items-center gap-2 w-full">
                <meter id="password-strength-meter" min="0" max="4" low="2" high="3" optimum="4" value="0" class="mt-2 w-full"></meter>
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium  ">Confirma la contraseña</label> <!-- TODO: MINIMO 8 NO VA-->
                <input type="password" id="password_confirmation" name="password_confirmation" required class="input input-bordered flex items-center gap-2 w-full">
            </div>

            <div class="flex flex-col gap-4">
                <button type="submit" class="w-full btn btn-primary">Registrarse</button>
                <a href="{{ route('login') }}" class="text-sm self-center">¿Ya tienes una cuenta? Inicia sesión</a>
            </div>
        </form>
    </div>
</main>

@endsection
