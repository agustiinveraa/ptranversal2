@extends('layouts.app')
@section('home')

@include('partials.hero-parallax')
<main class="container max-w-screen-xl mx-auto flex flex-col my-20 gap-10">
    <section>
        <div class="flex flex-col justify-center">
            <h2 class="text-2xl md:text-4xl font-bold mb-10 text-center">Descubre nuestros productos</h2>
            <div class="grid md:grid-cols-3 grid-cols-1 gap-4 max-w-screen mx-auto">
                <x-product-minicard title="Funda para móvil" badge="TOP 🔝" image="4646.webp" productId="1" price="100">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod, quae.
                </x-product-minicard>
                <x-product-minicard title="Funda para tablet" badge="HOT 🔥" image="tablet.jpg" productId="2" price="200">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod, quae.
                </x-product-minicard>
                <x-product-minicard title="Funda para pc" badge="-50% 💸" image="laptop.jpg" productId="3" price="300">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod, quae.
                </x-product-minicard>
            </div>
        </div>
    </section>
</main>
<x-cta />

@endsection
