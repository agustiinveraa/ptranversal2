@extends('layouts.admin')

@section('usersedit')
<div class="container py-5">
    <div class="text-center mb-5">
        <p class="text-sm text-gray-400">Panell d'administració</p>
        <h2 class="text-4xl font-bold text-indigo-700">Editar usuari</h2>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nom d'usuari</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correu electrònic</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="fullName" class="form-label">Nom complet</label>
                    <input type="text" class="form-control @error('fullName') is-invalid @enderror" id="fullName" name="fullName" value="{{ old('fullName', $user->fullName) }}">
                    @error('fullName')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="birthDate" class="form-label">Data de naixement</label>
                    <input type="date" class="form-control @error('birthDate') is-invalid @enderror" id="birthDate" name="birthDate" value="{{ old('birthDate', $user->birthDate) }}">
                    @error('birthDate')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Telèfon</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
                    @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="shippingAddress" class="form-label">Adreça d'enviament</label>
                    <input type="text" class="form-control @error('shippingAddress') is-invalid @enderror" id="shippingAddress" name="shippingAddress" value="{{ old('shippingAddress', $user->shippingAddress) }}">
                    @error('shippingAddress')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="billingAddress" class="form-label">Adreça de facturació</label>
                    <input type="text" class="form-control @error('billingAddress') is-invalid @enderror" id="billingAddress" name="billingAddress" value="{{ old('billingAddress', $user->billingAddress) }}">
                    @error('billingAddress')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="preferredMaterial" class="form-label">Material preferit</label>
                    <input type="text" class="form-control @error('preferredMaterial') is-invalid @enderror" id="preferredMaterial" name="preferredMaterial" value="{{ old('preferredMaterial', $user->preferredMaterial) }}">
                    @error('preferredMaterial')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Rol</label>
                    <select class="form-select @error('role') is-invalid @enderror" id="role" name="role">
                        <option value="user" {{ (old('role', $user->role) === 'user' && !$user->admin) ? 'selected' : '' }}>Usuari</option>
                        <option value="admin" {{ (old('role', $user->role) === 'admin' || $user->admin) ? 'selected' : '' }}>Administrador</option>
                    </select>
                    @error('role')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.users') }}" class="btn btn-secondary">Tornar</a>
                    <button type="submit" class="btn btn-primary">Actualitzar usuari</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection