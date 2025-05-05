@extends('layouts.app')

@section('terms-of-use')

<div class="container mx-auto py-8 px-4">
    <h1 class="text-3xl font-bold mb-6">Términos de Uso</h1>
    
    <div class="prose max-w-none">
        <p class="mb-4">Última actualización: {{ date('d/m/Y') }}</p>
        
        <p>Bienvenido a Funda Creativa. Al acceder a este sitio web, usted acepta cumplir con estos términos de servicio, 
        todas las leyes y regulaciones aplicables, y reconoce que es responsable de cumplir con las leyes locales aplicables.</p>
        
        <h2 class="text-2xl font-semibold mt-6 mb-3">1. Licencia de uso</h2>
        <p>Se concede permiso para utilizar temporalmente este sitio web solo para uso personal y no comercial. 
        Esta licencia no incluye:</p>
        <ul class="list-disc pl-6 mb-4">
            <li>Modificar o copiar los materiales</li>
            <li>Utilizar los materiales para cualquier propósito comercial</li>
            <li>Intentar descompilar o realizar ingeniería inversa del software contenido en el sitio</li>
            <li>Eliminar cualquier copyright u otras notaciones de propiedad de los materiales</li>
        </ul>
        
        <h2 class="text-2xl font-semibold mt-6 mb-3">2. Exención de responsabilidad</h2>
        <p>Los materiales en el sitio web de Funda Creativa se proporcionan "tal cual". Funda Creativa no ofrece garantías, 
        expresas o implícitas, y por la presente renuncia y niega todas las demás garantías, incluyendo, sin limitación, 
        garantías o condiciones implícitas de comerciabilidad, idoneidad para un propósito particular, o no infracción de 
        propiedad intelectual u otra violación de derechos.</p>
        
        <h2 class="text-2xl font-semibold mt-6 mb-3">3. Limitaciones</h2>
        <p>En ningún caso Funda Creativa o sus proveedores serán responsables por daños (incluyendo, sin limitación, daños por 
        pérdida de datos o beneficios, o debido a la interrupción del negocio) que surjan del uso o la incapacidad de usar los 
        materiales en el sitio web de Funda Creativa.</p>
        
        <h2 class="text-2xl font-semibold mt-6 mb-3">4. Precisión de los materiales</h2>
        <p>Los materiales que aparecen en el sitio web de Funda Creativa podrían incluir errores técnicos, tipográficos o 
        fotográficos. Funda Creativa no garantiza que cualquiera de los materiales en su sitio web sea preciso, completo o 
        actual.</p>
        
        <h2 class="text-2xl font-semibold mt-6 mb-3">5. Modificaciones</h2>
        <p>Funda Creativa puede revisar estos términos de servicio para su sitio web en cualquier momento sin previo aviso. 
        Al utilizar este sitio web, usted acepta estar sujeto a la versión actual de estos términos de servicio.</p>
        
        <h2 class="text-2xl font-semibold mt-6 mb-3">6. Legislación aplicable</h2>
        <p>Estos términos y condiciones se rigen e interpretan de acuerdo con las leyes de España y usted se somete 
        irrevocablemente a la jurisdicción exclusiva de los tribunales de esa localidad.</p>
        
        <h2 class="text-2xl font-semibold mt-6 mb-3">7. Contacto</h2>
        <p>Si tiene preguntas sobre estos Términos de Uso, puede contactarnos en:</p>
        <p>Email: legal@fundacreativa.com</p>
        <p>Teléfono: +34 912 345 678</p>
    </div>
</div>
@endsection
