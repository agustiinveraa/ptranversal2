@props(['title', 'badge', 'image', 'productId', 'price', 'stock'])
@vite('resources/js/cart.js')
<div class="card bg-base-100 w-96 shadow-xl">
  <figure>
    <img
      src="{{ asset('images/products/' . $image) }}"
      alt="Foto de producto"
      class=""
    />
  </figure>
  <div class="card-body">
    <div class="flex justify-between align-center">
      <div>
        <h2 class="card-title">
          {{ $title }}
          <div class="badge badge-primary">{{ $badge }}</div>
        </h2>
      </div>
      <div class="rating rating-sm">
          <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
          <input
            type="radio"
            name="rating-2"
            class="mask mask-star-2 bg-orange-400"
            checked="checked" />
          <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
          <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
          <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
        </div>
    </div>

      
    <p>{{ $slot }}</p>
    
    
    <button onclick="addToCart({{ $productId }}, '{{ $title }}', '{{ $image }}', '{{$price}}')" class="btn btn-primary">Añadir al carrito <span class="font-bold">({{ $price }}€)</span></button>
    <a href="{{ route('producto', ['id' => $productId]) }}" class="btn">Ver Producto</a>

    <div class="card-actions justify-center my-2">
      <div class="badge badge-outline">Con IVA</div>
      <div class="badge badge-outline">Disponible</div>
      <div class="badge badge-outline">Envío 24h</div>
    </div>
  </div>
</div>

