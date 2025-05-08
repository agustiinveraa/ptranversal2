@extends('layouts.admin')

@section('dashboard')
<div class="container py-5">
    <div class="text-center mb-10">
        <p class="text-sm text-gray-400">Panell d'administració</p>
        <h2 class="text-4xl font-bold text-indigo-700">Benvingut al panell d'administració</h2>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-4">
        <!-- Gestió de categories -->
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Gestió de categories</h5>
                    <p class="card-text">Administra les categories de productes de la botiga.</p>
                    <a href="{{ route('admin.categories') }}" class="btn btn-primary">Gestionar categories</a>
                </div>
            </div>
        </div>

        <!-- Gestió de subcategories -->
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Gestió de subcategories</h5>
                    <p class="card-text">Administra les subcategories de productes de la botiga.</p>
                    <a href="{{ route('admin.subcategories') }}" class="btn btn-primary">Gestionar subcategories</a>
                </div>
            </div>
        </div>

        <!-- Gestió de productes -->
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Gestió de productes</h5>
                    <p class="card-text">Administra els productes disponibles a la botiga.</p>
                    <a href="{{ route('admin.products') }}" class="btn btn-primary">Gestionar productes</a>
                </div>
            </div>
        </div>

        <!-- Gestió d'usuaris -->
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Gestió d'usuaris</h5>
                    <p class="card-text">Administra els usuaris registrats a la plataforma.</p>
                    <a href="{{ route('admin.users') }}" class="btn btn-primary">Gestionar usuaris</a>
                </div>
            </div>
        </div>

        <!-- Gestió d'estoc -->
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Gestió d'estoc</h5>
                    <p class="card-text">Controla l'estoc dels productes i aplica descomptes.</p>
                    <a href="{{ route('admin.stock') }}" class="btn btn-primary">Gestionar estoc</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection