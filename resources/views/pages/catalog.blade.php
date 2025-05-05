@extends('layouts.app')
@section('catalog')
<main class="container max-w-screen-xl mx-auto py-24 min-h-screen">

  <div class="text-center mb-10">
    <p class="text-sm text-gray-400">Catálogo</p>
    <h2 class="text-4xl font-bold text-indigo-700">Descubre nuestros productos</h2>
  </div>

  <section>
    <div class="grid md:grid-cols-3 grid-cols-1 gap-6">
      @foreach($products as $product)
        <x-product-minicard 
          title="{{ $product->title }}" 
          badge="{{ $product->badge }}" 
          image="{{ $product->image }}" 
          productId="{{ $product->id }}" 
          price="{{ $product->price }}"
          stock="{{ $product->stock }}">
          {{ $product->description }}
        </x-product-minicard>
      @endforeach
    </div>
  </section>
</main>
@endsection
