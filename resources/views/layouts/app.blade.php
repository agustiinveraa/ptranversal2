<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funda Creativa</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.svg') }}" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
crossorigin=""/> <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
crossorigin=""></script>
</head>
<body>
    @include('partials.navbar')
    @yield('home')
    @yield('login')
    @yield('register')
    @yield('contact')
    @yield('catalog')
    @yield('faq')
    @yield('about')
    @yield('cart')
    @yield('terms-of-use')
    @yield('privacy-policy')
    @yield('cookies')
    @yield('checkout')
    @include('components.cookie-banner')
    @include('partials.footer')
    @stack('scripts')
</body>
</html>
