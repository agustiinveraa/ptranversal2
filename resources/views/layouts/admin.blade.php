@extends('layouts.app')

@section('admin')
<div class="container max-w-screen-xl mx-auto px-4 py-16 sm:py-24 min-h-screen">
    @yield('stock')
    @yield('categories')
    @yield('products')
    @yield('productscreate')
    @yield('productsedit')
    @yield('subcategories')
    @yield('subcategoriescreate')
    @yield('subcategoriesedit')
    @yield('users')
    @yield('usersedit')
    @yield( 'dashboard')
</div>
@endsection