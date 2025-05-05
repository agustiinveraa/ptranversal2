@extends('layouts.app')

@section('privacy-policy')
<div class="container mx-auto py-8 px-4">
    <h1 class="text-3xl font-bold mb-6">Política de Privacidad</h1>
    
    <div class="prose max-w-none">
        <p class="mb-4">Última actualización: {{ date('d/m/Y') }}</p>
        
        <h2 class="text-2xl font-semibold mt-6 mb-3">1. Información que recopilamos</h2>
        <p>En Funda Creativa, recopilamos información personal como su nombre, dirección de correo electrónico, 
        dirección postal, número de teléfono y detalles de pago cuando utiliza nuestros servicios o realiza una compra.</p>
        
        <h2 class="text-2xl font-semibold mt-6 mb-3">2. Cómo utilizamos su información</h2>
        <p>Utilizamos la información recopilada para:</p>
        <ul class="list-disc pl-6 mb-4">
            <li>Procesar sus pedidos y transacciones</li>
            <li>Comunicarnos con usted sobre su cuenta o pedidos</li>
            <li>Proporcionar atención al cliente</li>
            <li>Personalizar su experiencia en nuestro sitio</li>
            <li>Mejorar nuestros productos y servicios</li>
        </ul>
        
        <h2 class="text-2xl font-semibold mt-6 mb-3">3. Protección de datos</h2>
        <p>Implementamos medidas de seguridad diseñadas para proteger su información personal. 
        Sin embargo, ningún sistema es completamente seguro, y no podemos garantizar la seguridad absoluta de su información.</p>
        
        <h2 class="text-2xl font-semibold mt-6 mb-3">4. Sus derechos</h2>
        <p>Usted tiene derecho a:</p>
        <ul class="list-disc pl-6 mb-4">
            <li>Acceder a su información personal</li>
            <li>Rectificar datos inexactos</li>
            <li>Solicitar la eliminación de sus datos</li>
            <li>Oponerse al procesamiento de sus datos</li>
            <li>Presentar una reclamación ante una autoridad de control</li>
        </ul>
        
        <h2 class="text-2xl font-semibold mt-6 mb-3">5. Contacto</h2>
        <p>Si tiene preguntas sobre esta Política de Privacidad, puede contactarnos en:</p>
        <p>Email: privacy@fundacreativa.com</p>
        <p>Teléfono: +34 912 345 678</p>
    </div>
</div>
@endsection
