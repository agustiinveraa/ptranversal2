@extends('layouts.app')
@section('cart')
<div class="container max-w-screen-xl mx-auto py-24 min-h-screen">
  <div class="text-center mb-10">
    <p class="text-sm text-gray-400">Carrito</p>
    <h2 class="text-4xl font-bold text-indigo-700">Tu carrito de compra</h2>
  </div>
    <div class="grid lg:grid-cols-3 lg:gap-x-8 gap-x-6 gap-y-8 mt-6">
        <div class="lg:col-span-2 space-y-6" id="cart-items">
            <!-- Productos se mostrarán aquí -->
            <p class="text-gray-500">No hay productos en el carrito</p>
        </div>

        <div class="bg-white rounded-md px-4 py-6 h-max shadow border">
            <ul class="text-slate-500 font-medium space-y-4">
                <li class="flex flex-wrap gap-4 text-sm">Subtotal <span id="cart-subtotal" class="ml-auto font-semibold text-slate-900">0€</span></li>
                <li class="flex flex-wrap gap-4 text-sm">IVA (21%) <span id="cart-tax" class="ml-auto font-semibold text-slate-900">0€</span></li>
                <hr class="border-slate-300" />
                <li class="flex flex-wrap gap-4 text-sm font-semibold text-slate-900">Total <span id="cart-total" class="ml-auto">0€</span></li>
            </ul>

            <div class="mt-8 space-y-4">
                <a href="/checkout" class="btn btn-primary w-full mt-4">
                    Finalizar Compra
                </a>
                <a href="/" class="text-sm px-4 py-2.5 w-full font-medium tracking-wide bg-slate-50 hover:bg-slate-100 text-slate-900 border rounded-lg block text-center">
                    Seguir Comprando
                </a>
            </div>

            <div class="mt-5 flex flex-wrap justify-center gap-4">
                <img src='https://readymadeui.com/images/master.webp' alt="card1" class="w-10 object-contain" />
                <img src='https://readymadeui.com/images/visa.webp' alt="card2" class="w-10 object-contain" />
                <img src='https://readymadeui.com/images/american-express.webp' alt="card3" class="w-10 object-contain" />
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
  function displayCart() {
    const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
    const cartContainer = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');
    const cartSubtotal = document.getElementById('cart-subtotal');
    const cartTax = document.getElementById('cart-tax');

    cartContainer.innerHTML = '';
    
    if (cartItems.length === 0) {
      cartContainer.innerHTML = '<p class="text-gray-500">No hay productos en el carrito</p>';
      cartTotal.textContent = '0€';
      cartSubtotal.textContent = '0€';
      cartTax.textContent = '0€';
      return;
    }

    let subtotal = 0;
    let tax = 0;
    
    cartItems.forEach(item => {
      const div = document.createElement('div');
      div.className = 'flex gap-4 bg-white px-4 py-6 rounded-md shadow border';
      const priceWithoutTax = (item.price / 1.21).toFixed(2);
      const itemTax = (item.price - priceWithoutTax) * item.quantity;

      div.innerHTML = `
        <div class="flex gap-6 sm:gap-4 max-sm:flex-col flex-1">
            <div class="w-24 h-24 max-sm:w-24 max-sm:h-24 shrink-0">
                <img src="/images/products/${item.image}" class="w-full h-full object-contain" />
            </div>
            <div class="flex flex-col gap-4 flex-1">
                <div>
                    <h3 class="text-sm sm:text-base font-semibold text-slate-900">${item.title}</h3>
                    <p class="text-[13px] font-medium text-slate-500 mt-2">Precio unitario: ${priceWithoutTax}€ + IVA</p>
                </div>
                <div class="mt-auto">
                    <h3 class="text-sm font-semibold text-slate-900">${item.price}€</h3>
                </div>
            </div>
        </div>
        
        <div class="ml-auto flex flex-col">
            <div class="flex items-start gap-4 justify-end">
                <svg xmlns="http://www.w3.org/2000/svg" onclick="removeFromCart(${item.productId})" class="w-4 h-4 cursor-pointer fill-slate-400 hover:fill-red-600 inline-block" viewBox="0 0 24 24">
                    <path d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"/>
                    <path d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"/>
                </svg>
            </div>
            <div class="flex items-center gap-3 mt-auto">
                <button type="button" onclick="updateQuantity(${item.productId}, -1)"
                    class="flex items-center justify-center w-[18px] h-[18px] bg-primary outline-none rounded-full hover:bg-slate-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2 fill-white" viewBox="0 0 124 124">
                        <path d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z"/>
                    </svg>
                </button>
                <span class="font-semibold text-base leading-[18px]">${item.quantity}</span>
                <button type="button" onclick="updateQuantity(${item.productId}, 1)"
                    class="flex items-center justify-center w-[18px] h-[18px] bg-primary outline-none rounded-full hover:bg-slate-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2 fill-white" viewBox="0 0 42 42">
                        <path d="M37.059 16H26V4.941C26 2.224 23.718 0 21 0s-5 2.224-5 4.941V16H4.941C2.224 16 0 18.282 0 21s2.224 5 4.941 5H16v11.059C16 39.776 18.282 42 21 42s5-2.224 5-4.941V26h11.059C39.776 26 42 23.718 42 21s-2.224-5-4.941-5z"/>
                    </svg>
                </button>
            </div>
        </div>
      `;
      cartContainer.appendChild(div);
      
      subtotal += priceWithoutTax * item.quantity;
      tax += itemTax;
    });
    
    const total = subtotal + tax;
    cartSubtotal.textContent = subtotal.toFixed(2) + '€';
    cartTax.textContent = tax.toFixed(2) + '€';
    cartTotal.textContent = total.toFixed(2) + '€';
  }

  // Mantener las funciones updateQuantity y removeFromCart igual que antes
  function updateQuantity(productId, change) {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const item = cart.find(item => item.productId === productId);
    
    if (item) {
      const newQuantity = item.quantity + change;
      if (newQuantity < 1) {
        removeFromCart(productId);
        updateCartCount();
        return;
      }
      item.quantity = newQuantity;
      localStorage.setItem('cart', JSON.stringify(cart));
      displayCart();
      updateCartCount();
    }
  }

  function removeFromCart(productId) {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const updatedCart = cart.filter(item => item.productId !== productId);
    localStorage.setItem('cart', JSON.stringify(updatedCart));
    displayCart();
    updateCartCount();
  }

  document.addEventListener('DOMContentLoaded', displayCart);
</script>
@endpush
@endsection