@extends('layouts.app')

@section('profile')
<div class="container max-w-screen-xl mx-auto px-4 py-16 sm:py-24 min-h-screen">
    <div class="card-body">
        <h1 class="card-title text-3xl font-bold mb-8">Mi Perfil</h1>
        
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Nombre
                </label>
                <input class="input input-bordered w-full @error('name') is-invalid @enderror"
                    id="name" name="name" type="text" value="{{ old('name', auth()->user()->name) }}" required>
                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Correo Electrónico
                </label>
                <input class="input input-bordered w-full @error('email') is-invalid @enderror"
                    id="email" name="email" type="email" value="{{ old('email', auth()->user()->email) }}" required>
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button class="btn btn-primary" type="submit">
                    Actualizar Perfil
                </button>
            </div>
        </form>
    </div>
</div>
<!-- 
 <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Nueva Contraseña
                </label>
                <input class="input input-bordered w-full @error('password') is-invalid @enderror"
                    id="password" name="password" type="password">
                @error('password')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">
                    Confirmar Nueva Contraseña
                </label>
                <input class="input input-bordered w-full @error('password_confirmation') is-invalid @enderror"
                    id="password_confirmation" name="password_confirmation" type="password">
                @error('password_confirmation')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

-->
@endsection
