@props(['total'])
@extends('layouts.app')

@section('checkout')
<main class="container max-w-screen-xl mx-auto flex flex-col my-20 gap-10 min-h-screen">
<section class="py-8 bg-base-100">
  <div class="container mx-auto px-4">
    <div class="max-w-4xl mx-auto">
      <div class="text-center mb-10">
        <p class="text-sm text-gray-400">Pago</p>
        <h2 class="text-4xl font-bold text-indigo-700">Finalizar compra</h2>
      </div>
      <div class="flex flex-col lg:flex-row gap-8">

        <div class="card bg-base-100 shadow-xl w-full max-w-lg">
          <div class="card-body">
            <h3 class="card-title mb-4">Información de Pago</h3>
            <form action="{{ route('order.store') }}" method="POST" class="space-y-4" id="checkout-form">
    @csrf
              <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2 sm:col-span-1">
                  <label for="full_name" class="label">
                    <span class="label-text">Nombre completo*</span>
                  </label>
                  <input
                    type="text"
                    id="full_name"
                    placeholder="María García"
                    class="input input-bordered w-full"
                    required
                  />
                </div>
                <div class="col-span-2 sm:col-span-1">
                  <label for="card-number-input" class="label">
                    <span class="label-text">Número de tarjeta*</span>
                  </label>
                  <input
                    type="text"
                    id="card-number-input"
                    placeholder="xxxx-xxxx-xxxx-xxxx"
                    class="input input-bordered w-full"
                    pattern="^4[0-9]{12}(?:[0-9]{3})?$"
                    required
                  />
                </div>
              </div>
              <div class="grid grid-cols-2 gap-4">
                <div>
                  <label for="card-expiration-input" class="label">
                    <span class="label-text">Expiración de tarjeta*</span>
                  </label>
                  <input
                    type="text"
                    id="card-expiration-input"
                    placeholder="mm/aa"
                    class="input input-bordered w-full"
                    required
                  />
                </div>
                <div>
                  <label for="cvv-input" class="label flex items-center gap-1">
                    <span class="label-text">CVV*</span>
                    <span class="tooltip tooltip-right" data-tip="Los últimos 3 dígitos en el reverso de la tarjeta">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd" />
                      </svg>
                    </span>
                  </label>
                  <input
                    type="number"
                    id="cvv-input"
                    placeholder="•••"
                    class="input input-bordered w-full"
                    required
                  />
                </div>
              </div>
              <button type="submit" class="btn btn-primary w-full mt-4" id="submit-button">Pagar ahora</button>
    <script>
        document.getElementById('checkout-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const cart = JSON.parse(localStorage.getItem('cart') || '[]');
            const total = {{ $total }};
            
            fetch(this.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    cart: cart,
                    total: total
                })
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    localStorage.removeItem('cart');
                    window.location.href = '/'; // Redirigir a la página principal
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
            </form>
          </div>
        </div>

        <div class="card bg-base-100 shadow-xl w-full">
          <div class="card-body">
            <h3 class="card-title mb-4">Resumen de Compra</h3>
            <div class="space-y-2">
              <div class="flex justify-between">
                <span class="text-gray-500">Precio original</span>
                <span class="font-medium text-gray-900">6,592.00 €</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-500">Descuento</span>
                <span class="font-medium text-green-500">-299.00 €</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-500">Recogida en tienda</span>
                <span class="font-medium text-gray-900">99 €</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-500">Impuesto</span>
                <span class="font-medium text-gray-900">799 €</span>
              </div>
            </div>
            <div class="divider"></div>
            <div class="flex justify-between">
              <span class="font-bold text-gray-900">Total</span>
              <span class="font-bold text-gray-900">7,191.00 €</span>
            </div>
            <div class="mt-6 flex items-center justify-center gap-4">
              <img class="h-8" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/paypal.svg" alt="Paypal" />
              <img class="h-8" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/visa.svg" alt="Visa" />
              <img class="h-8" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/mastercard.svg" alt="Mastercard" />
            </div>
          </div>
        </div>
      </div>
      <p class="mt-6 text-center text-gray-500">
        Pago procesado por <a href="#" class="link link-primary">Stripe</a> para <a href="#" class="link link-primary">Funda Creativa SL</a> - España
      </p>
    </div>
  </div>
</section>
</main>
@endsection