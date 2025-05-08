@extends('layouts.app')
@section('about')
<main class="container max-w-screen-xl mx-auto flex flex-col my-20 gap-10 min-h-screen">
<section class="hero py-24">
  <div class="hero-content flex-col lg:flex-row">
    <div>
      <p class="text-sm text-gray-400">Sobre nosotros</p>
      <h1 class="text-4xl font-bold text-indigo-700">
        Protege y personaliza tus dispositivos
      </h1>
      <p class="py-6 text-gray-500">
      Nos apasiona cuidar cada detalle, asegurando que cada producto no solo embellezca, sino que también brinde la máxima seguridad a tus dispositivos.
        </p>
      
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div class="card bg-base-100 shadow">
          <div class="card-body">
            <h2 class="card-title">5+ Años de Experiencia</h2>
            <p>Innovación y calidad en cada diseño</p>
          </div>
        </div>
        <div class="card bg-base-100 shadow">
          <div class="card-body">
            <h2 class="card-title">500+ Diseños Únicos</h2>
            <p>Variedad para todos los gustos y dispositivos</p>
          </div>
        </div>
        <div class="card bg-base-100 shadow">
          <div class="card-body">
            <h2 class="card-title">10K+ Clientes Satisfechos</h2>
            <p>Confianza y estilo en cada compra</p>
          </div>
        </div>
        <div class="card bg-base-100 shadow">
          <div class="card-body">
            <h2 class="card-title">Envío Mundial</h2>
            <p>Lleva tu estilo a cualquier rincón del mundo</p>
          </div>
        </div>
      </div>
      
      <a href="{{ route('catalogo') }}" class="btn btn-primary">
        Nuestro catálogo
        <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 18 18">
          <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M6.75 4.5l4.5 4.5-4.5 4.5"/>
        </svg>
      </a>
    </div>
    
    <div>
      <img src="{{ asset('images/misc/about.png') }}" class="rounded-3xl shadow-lg" alt="about Us image" />
    </div>
  </div>
</section>

</main>
@endsection