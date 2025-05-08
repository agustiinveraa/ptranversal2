@extends('layouts.app')
@section('productdetail')
<div class="container max-w-screen-xl mx-auto flex flex-col my-20 gap-10 min-h-screen">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <!-- Sección de imágenes -->
    <div class="space-y-4">
      <div class="relative rounded-lg overflow-hidden shadow-lg">
        <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->title }}" class="w-full h-auto object-cover">
        <div class="absolute top-4 left-4 bg-indigo-600 text-white px-3 py-1 rounded-full text-xs font-bold">NUEVO</div>
      </div>
      <div class="grid grid-cols-4 gap-2">
        <div class="border rounded-md p-1 cursor-pointer hover:border-indigo-500 transition">
          <img src="{{ asset('images/products/' . $product->image) }}" class="w-full h-16 object-contain">
        </div>
        <div class="border rounded-md p-1 cursor-pointer hover:border-indigo-500 transition">
          <img src="{{ asset('images/products/' . $product->image) }}" class="w-full h-16 object-contain">
        </div>
        <div class="border rounded-md p-1 cursor-pointer hover:border-indigo-500 transition">
          <img src="{{ asset('images/products/' . $product->image) }}" class="w-full h-16 object-contain">
        </div>
        <div class="border rounded-md p-1 cursor-pointer hover:border-indigo-500 transition">
          <img src="{{ asset('images/products/' . $product->image) }}" class="w-full h-16 object-contain">
        </div>
      </div>
    </div>

    <!-- Sección de información -->
    <div class="space-y-6">
      <div>
        <h1 class="text-3xl font-bold text-gray-900">{{ $product->title }}</h1>
        <div class="flex items-center mt-2">
          <div class="flex text-yellow-400">
            ★★★★★
          </div>
          <span class="text-gray-500 ml-2">(24 reseñas)</span>
        </div>
      </div>

      <div class="space-y-2">
        <div class="text-2xl font-bold text-indigo-600">{{ $product->price }}€</div>
        <div class="text-green-600 text-sm font-medium">En stock • Envío gratis</div>
      </div>

      <div class="text-gray-600 leading-relaxed">
        {{ $product->description }}
      </div>

      <div class="pt-4 border-t border-gray-200">
        <div class="flex items-center gap-4 mb-4">
          <div class="flex items-center border rounded-md">
            <button class="px-3 py-1 text-gray-600 hover:bg-gray-100">-</button>
            <span class="px-3 py-1">1</span>
            <button class="px-3 py-1 text-gray-600 hover:bg-gray-100">+</button>
          </div>
          <button onclick="addToCart({{ $product->id }}, '{{ $product->title }}', '{{ $product->image }}', '{{ $product->price }}')" class="btn btn-primary flex-1">
            Añadir al carrito
          </button>
        </div>
        <button class="w-full py-2 px-4 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition">
          Comprar ahora
        </button>
      </div>

      <div class="pt-4 border-t border-gray-200">
        <h3 class="font-semibold text-gray-900 mb-2">Características</h3>
        <ul class="space-y-2 text-sm text-gray-600">
          <li class="flex"><span class="w-32 text-gray-500">Marca:</span> {{ $product->brand ?? 'Genérica' }}</li>
          <li class="flex"><span class="w-32 text-gray-500">Modelo:</span> {{ $product->model ?? '2023' }}</li>
          <li class="flex"><span class="w-32 text-gray-500">Disponibilidad:</span> En stock</li>
          <li class="flex"><span class="w-32 text-gray-500">Garantía:</span> 2 años</li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Sección de detalles adicionales -->
  <div class="mt-12">
    <div class="border-b border-gray-200">
      <nav class="flex space-x-8">
        <button class="py-4 px-1 border-b-2 border-indigo-500 font-medium text-sm text-indigo-600">Descripción</button>
        <button class="py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300">Especificaciones</button>
        <button class="py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300" onclick="showReviews()">Reseñas</button>
      </nav>
    </div>

    <div class="py-8" id="description-section">
      <h3 class="text-lg font-medium text-gray-900 mb-4">Descripción detallada</h3>
      <div class="prose max-w-none text-gray-500">
        <p>Este producto de alta calidad ofrece un rendimiento excepcional y durabilidad. Diseñado para satisfacer las necesidades más exigentes, combina funcionalidad con un diseño elegante.</p>
        <ul>
          <li>Materiales premium para mayor resistencia</li>
          <li>Tecnología innovadora para mejor rendimiento</li>
          <li>Diseño ergonómico para mayor comodidad</li>
          <li>Garantía extendida de 2 años</li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Sección de reseñas -->
  <div class="py-8 hidden" id="reviews-section">
    <h3 class="text-lg font-medium text-gray-900 mb-6">Reseñas de clientes</h3>
    
    <div class="space-y-6 mb-8">
      <!-- Reseñas mock -->
      <div class="border-b border-gray-200 pb-6">
        <div class="flex justify-between items-start">
          <div>
            <h4 class="font-medium text-gray-900">Juan Pérez</h4>
            <div class="flex items-center mt-1">
              <div class="flex text-yellow-400">
                ★★★★★
              </div>
              <span class="text-gray-500 text-sm ml-2">Hace 2 semanas</span>
            </div>
          </div>
        </div>
        <p class="mt-2 text-gray-600">Excelente producto, cumple con todas mis expectativas. Lo recomiendo totalmente.</p>
      </div>
      
      <div class="border-b border-gray-200 pb-6">
        <div class="flex justify-between items-start">
          <div>
            <h4 class="font-medium text-gray-900">Ana García</h4>
            <div class="flex items-center mt-1">
              <div class="flex text-yellow-400">
                ★★★★☆
              </div>
              <span class="text-gray-500 text-sm ml-2">Hace 1 mes</span>
            </div>
          </div>
        </div>
        <p class="mt-2 text-gray-600">Muy buen producto, aunque el envío tardó un poco más de lo esperado.</p>
      </div>
    </div>
    
    <!-- Formulario para añadir reseña -->
    <div class="bg-gray-50 p-6 rounded-lg">
      <h4 class="text-lg font-medium text-gray-900 mb-4">Añade tu reseña</h4>
      <form>
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-medium mb-2">Tu valoración</label>
          <div class="flex space-x-1">
            <button type="button" class="text-gray-400 hover:text-yellow-400" onclick="setRating(1)">★</button>
            <button type="button" class="text-gray-400 hover:text-yellow-400" onclick="setRating(2)">★</button>
            <button type="button" class="text-gray-400 hover:text-yellow-400" onclick="setRating(3)">★</button>
            <button type="button" class="text-gray-400 hover:text-yellow-400" onclick="setRating(4)">★</button>
            <button type="button" class="text-gray-400 hover:text-yellow-400" onclick="setRating(5)">★</button>
          </div>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-medium mb-2">Tu nombre</label>
          <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Nombre">
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-medium mb-2">Tu reseña</label>
          <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" rows="4" placeholder="Escribe tu reseña aquí..."></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar reseña</button>
      </form>
    </div>
  </div>
  
  <script>
    function showReviews() {
      document.getElementById('description-section').classList.add('hidden');
      document.getElementById('reviews-section').classList.remove('hidden');
      document.querySelectorAll('nav button').forEach(btn => {
        btn.classList.remove('border-indigo-500', 'text-indigo-600');
        btn.classList.add('border-transparent', 'text-gray-500');
      });
      event.target.classList.add('border-indigo-500', 'text-indigo-600');
      event.target.classList.remove('border-transparent', 'text-gray-500');
    }
    
    function setRating(rating) {
      const stars = document.querySelectorAll('form button');
      stars.forEach((star, index) => {
        if (index < rating) {
          star.classList.add('text-yellow-400');
          star.classList.remove('text-gray-400');
        } else {
          star.classList.add('text-gray-400');
          star.classList.remove('text-yellow-400');
        }
      });
    }
  </script>

  <!-- Productos relacionados -->
  <div class="mt-12">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Productos relacionados</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
      @foreach($relatedProducts as $related)
      <div class="group relative">
        <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75">
          <img src="{{ asset('images/products/' . $related->image) }}" alt="{{ $related->title }}" class="h-full w-full object-cover object-center">
        </div>
        <div class="mt-4">
          <h3 class="text-sm text-gray-700">
            <a href="{{ route('product.show', $related->id) }}">
              <span aria-hidden="true" class="absolute inset-0"></span>
              {{ $related->title }}
            </a>
          </h3>
          <p class="mt-1 text-sm text-gray-500">{{ $related->subcategory->name ?? 'Sin categoría' }}</p>
          <p class="mt-1 text-sm font-medium text-gray-900">{{ $related->price }}€</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection