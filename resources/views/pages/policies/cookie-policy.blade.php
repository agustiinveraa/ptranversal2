@extends('layouts.app')

@section('cookies')
<div class="container mx-auto py-8 px-4">
    <h1 class="text-3xl font-bold mb-6">Política de Cookies</h1>
    
    <div class="prose max-w-none">
        <p class="mb-4">Última actualización: {{ date('d/m/Y') }}</p>
        
        <h2 class="text-2xl font-semibold mt-6 mb-3">1. ¿Qué son las cookies?</h2>
        <p>Las cookies son pequeños archivos de texto que se almacenan en su dispositivo cuando visita nuestro sitio web. 
        Estas cookies nos ayudan a hacer que el sitio funcione correctamente, a hacerlo más seguro y a proporcionar una mejor experiencia de usuario.</p>
        
        <h2 class="text-2xl font-semibold mt-6 mb-3">2. Tipos de cookies que utilizamos</h2>
        <ul class="list-disc pl-6 mb-4">
            <li><strong>Cookies esenciales:</strong> Necesarias para el funcionamiento básico del sitio.</li>
            <li><strong>Cookies analíticas:</strong> Nos ayudan a entender cómo interactúan los usuarios con nuestro sitio.</li>
            <li><strong>Cookies funcionales:</strong> Permiten recordar las preferencias del usuario para mejorar su experiencia.</li>
            <li><strong>Cookies publicitarias:</strong> Se utilizan para ofrecer publicidad relevante basada en sus intereses.</li>
        </ul>
        
        <h2 class="text-2xl font-semibold mt-6 mb-3">3. Control de cookies</h2>
        <p>Puede controlar y/o eliminar las cookies según desee. Puede eliminar todas las cookies que ya están en su dispositivo y puede configurar 
        la mayoría de los navegadores para evitar que se instalen. Sin embargo, si hace esto, es posible que deba ajustar manualmente algunas 
        preferencias cada vez que visite un sitio y algunos servicios y funcionalidades pueden no funcionar.</p>
        
        <h2 class="text-2xl font-semibold mt-6 mb-3">4. Cookies de terceros</h2>
        <p>Nuestro sitio puede utilizar servicios de terceros, como Google Analytics, que también utilizan cookies. 
        Estos servicios pueden recopilar información sobre su uso de nuestro sitio y otros sitios web.</p>
        
        <h2 class="text-2xl font-semibold mt-6 mb-3">5. Actualización de nuestra Política de Cookies</h2>
        <p>Esta Política de Cookies puede actualizarse periódicamente. Le recomendamos que revise esta página regularmente 
        para estar informado sobre cualquier cambio.</p>
        
        <h2 class="text-2xl font-semibold mt-6 mb-3">6. Contacto</h2>
        <p>Si tiene preguntas sobre nuestra Política de Cookies, puede contactarnos en:</p>
        <p>Email: cookies@fundacreativa.com</p>
        <p>Teléfono: +34 912 345 678</p>
    </div>
</div>
@endsection
