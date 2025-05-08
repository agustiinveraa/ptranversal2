@php
$items = [
    ['name' => 'Inicio', 'route' => '/'],
    ['name' => 'Sobre nosotros', 'route' => '/sobre-nosotros'],
    ['name' => 'Catálogo', 'route' => '/catalogo'],
    ['name' => 'Contacto', 'route' => '/contacto'],
    ['name' => 'FAQ', 'route' => '/faq'],
];

@endphp

<div class="navbar bg-base-100 max-w-screen-xl flex gap-2 items-center justify-end mx-auto p-4">
    <div class="navbar-start">
      <div class="dropdown">
        <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
            <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-5 w-5"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M4 6h16M4 12h8m-8 6h16" />
            </svg>
        </div>
        <ul
          tabindex="0"
          class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
          @foreach ($items as $item)
              <li><a href="{{ $item['route'] ?? '#' }}">{{ $item['name'] }}</a></li>
          @endforeach
        </ul>
      </div>
      <a class="text-xl" href="/">
        <img
            src="{{ asset('black-fc-logo.svg') }}"
            alt="Funda Creativa"
            class="w-32"
            id="theme-logo"
        >
      </a>
    </div>
    <div class="navbar-center hidden lg:flex">
      <ul class="menu menu-horizontal px-1">
        @foreach ($items as $item)
            <li><a href="{{ $item['route'] ?? '#' }}">{{ $item['name'] }}</a></li>
        @endforeach
      </ul>
    </div>
    <div class="navbar-end flex gap-1">
        
        <div class="group relative">
        <div role="button" class="btn btn-disabled btn-circle">
            <x-theme-controller />
        </div>
        <span class="absolute -bottom-10 left-[50%] -translate-x-[50%] 
        z-20 origin-top scale-0 px-3 rounded-lg border 
        border-gray-300 bg-white py-2 text-sm font-light
        shadow-md transition-all duration-300 ease-in-out 
        group-hover:scale-100 text-black">Próximamente...<span>
        </span></span></div>

        <div class="dropdown dropdown-end">
            <x-cart-navbar />

          </div>
          <div class="dropdown dropdown-end">
            @if (auth()->check())
              <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar online">
                <div class="w-10 rounded-full">
                  <img
                    alt="Tailwind CSS Navbar component"
                    src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                </div>
              </div>
              <ul
                tabindex="0"
                class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                <li>
                  <a class="justify-between" href="{{ route('profile.show')}}">
                    Perfil
                  </a>
                </li>
                <li><a>Ajustes</a></li>
                @if (auth()->user()->admin == 1)
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard de Admin</a></li>
                @endif
                <li> <form id="logout-form" action="{{ route('logout') }}" method="POST">
                  @csrf
              <button type="submit">Cerrar sesión</button></form></li>
              </ul>
            @else
              <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                <div class="h-8 w-8 rounded-full">
                  {{ svg('tni-user-circle-o') }}
                </div>
              </div>
              <ul
                tabindex="0"
                class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                <li><a href="/login">Iniciar sesión</a></li>
                <li><a href="/register">Registrarse</a></li>
              </ul>
            @endif
          </div>
        </div>
    </div>
  </div>

