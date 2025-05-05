@extends('layouts.app')
@section('catalog')
<main class="container max-w-screen-xl mx-auto px-4 py-16 sm:py-24 min-h-screen">
  <div class="text-center mb-8 sm:mb-10">
    <p class="text-sm text-gray-400">Catálogo</p>
    <h2 class="text-3xl sm:text-4xl font-bold text-indigo-700">Descubre nuestros productos</h2>
  </div>

  <div class="flex flex-col lg:flex-row gap-6 lg:gap-8">
    <!-- Filtro lateral con botón de toggle para móvil -->
    <div class="lg:hidden flex justify-between items-center mb-4 bg-white p-4 rounded-lg shadow-sm border">
      <h3 class="text-lg font-semibold">Filtros</h3>
      <button onclick="toggleFilters()" class="text-gray-600 hover:text-indigo-600">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
        </svg>
      </button>
    </div>
    <aside id="filters-menu" class="hidden lg:block w-full lg:w-64 bg-white p-4 sm:p-6 rounded-lg shadow-sm border sticky top-24 h-fit">
      <h3 class="text-lg font-semibold mb-4">Categorías</h3>
      <div class="space-y-4">
        @foreach($categories as $category)
          <div class="space-y-2">
            <button class="w-full text-left font-medium text-gray-700 hover:text-indigo-600 flex items-center justify-between"
                    onclick="toggleSubcategories('{{ $category->id }}')">
              {{ $category->name }}
              <svg class="w-4 h-4 transition-transform" id="arrow-{{ $category->id }}" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
              </svg>
            </button>
            <div class="hidden pl-4 space-y-2" id="subcategories-{{ $category->id }}">
              @foreach($category->subcategories as $subcategory)
                <label class="flex items-center space-x-2 cursor-pointer">
                  <input type="checkbox" class="form-checkbox text-indigo-600" 
                         value="{{ $subcategory->id }}" 
                         onchange="filterProducts()">
                  <span class="text-sm text-gray-600">{{ $subcategory->name }}</span>
                </label>
              @endforeach
            </div>
          </div>
        @endforeach
      </div>
    </aside>

    <!-- Grid de productos -->
    <section class="flex-1">
      <div class="grid md:grid-cols-2 grid-cols-1 gap-4" id="products-grid">
        @foreach($products as $product)
          <div class="product-card" data-category="{{ $product->subcategory->category->id }}" data-subcategory="{{ $product->subcategory->id }}">
            <x-product-minicard 
              title="{{ $product->title }}" 
              badge="{{ $product->badge }}" 
              image="{{ $product->image }}" 
              productId="{{ $product->id }}" 
              price="{{ $product->price }}"
              stock="{{ $product->stock }}">
              {{ $product->description }}
            </x-product-minicard>
          </div>
        @endforeach
      </div>
    </section>
  </div>
</main>
@push('scripts')
<script>
function toggleFilters() {
  const filtersMenu = document.getElementById('filters-menu');
  filtersMenu.classList.toggle('hidden');
}

function toggleSubcategories(categoryId) {
  const subcategoriesDiv = document.getElementById(`subcategories-${categoryId}`);
  const arrow = document.getElementById(`arrow-${categoryId}`);
  
  subcategoriesDiv.classList.toggle('hidden');
  arrow.style.transform = subcategoriesDiv.classList.contains('hidden') ? '' : 'rotate(-180deg)';
}

function filterProducts() {
  const selectedSubcategories = Array.from(document.querySelectorAll('input[type="checkbox"]:checked')).map(cb => cb.value);
  const productCards = document.querySelectorAll('.product-card');

  productCards.forEach(card => {
    if (selectedSubcategories.length === 0 || selectedSubcategories.includes(card.dataset.subcategory)) {
      card.style.display = '';
    } else {
      card.style.display = 'none';
    }
  });
}
</script>
@endpush

@endsection
