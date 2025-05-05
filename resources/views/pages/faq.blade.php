@extends('layouts.app')
@section('faq')
<main class="container max-w-screen-xl mx-auto flex flex-col my-20 gap-10 min-h-screen">
<section class="py-8">
  <div class="container mx-auto px-4 sm:py-16">
  <div class="text-center mb-10">
    <p class="text-sm text-gray-400">FAQ</p>
    <h2 class="text-4xl font-bold text-indigo-700">Preguntas frecuentes</h2>
  </div>
    <div class="grid md:grid-cols-2 gap-6 border-t border-base-300 pt-8">
      
      <div>
        <div tabindex="0" class="collapse collapse-plus border border-base-300 bg-base-100 rounded-box mb-4">
          <div class="collapse-title text-lg font-medium">
            ¿Qué tipos de fundas ofrece Funda Creativa?
          </div>
          <div class="collapse-content">
            <p>
              Ofrecemos fundas para móviles, tablets, laptops y más, con diseños exclusivos y opciones de personalización para cada dispositivo.
            </p>
          </div>
        </div>
        <div tabindex="0" class="collapse collapse-plus border border-base-300 bg-base-100 rounded-box mb-4">
          <div class="collapse-title text-lg font-medium">
            ¿Cuáles dispositivos son compatibles?
          </div>
          <div class="collapse-content">
            <p>
              Nuestras fundas se adaptan a la mayoría de los dispositivos del mercado, incluyendo los últimos modelos de iPhone, Samsung, Xiaomi y muchas otras marcas.
            </p>
          </div>
        </div>
        <div tabindex="0" class="collapse collapse-plus border border-base-300 bg-base-100 rounded-box mb-4">
          <div class="collapse-title text-lg font-medium">
            ¿Puedo personalizar mi funda?
          </div>
          <div class="collapse-content">
            <p>
              ¡Por supuesto! En Funda Creativa te ofrecemos opciones para elegir colores, texturas y diseños, permitiéndote crear una funda totalmente a tu medida.
            </p>
          </div>
        </div>
      </div>
      
      <div>
        <div tabindex="0" class="collapse collapse-plus border border-base-300 bg-base-100 rounded-box mb-4">
          <div class="collapse-title text-lg font-medium">
            ¿Cuál es el tiempo de envío?
          </div>
          <div class="collapse-content">
            <p>
              Nuestros pedidos se procesan rápidamente y, en la mayoría de los casos, se envían en un plazo de 3 a 5 días hábiles, dependiendo de tu ubicación.
            </p>
          </div>
        </div>
        <div tabindex="0" class="collapse collapse-plus border border-base-300 bg-base-100 rounded-box mb-4">
          <div class="collapse-title text-lg font-medium">
            ¿Ofrecen garantía en sus productos?
          </div>
          <div class="collapse-content">
            <p>
              Sí, todas nuestras fundas cuentan con una garantía de 12 meses, lo que respalda la calidad y durabilidad de nuestros productos.
            </p>
          </div>
        </div>
        <div tabindex="0" class="collapse collapse-plus border border-base-300 bg-base-100 rounded-box mb-4">
          <div class="collapse-title text-lg font-medium">
            ¿Cómo puedo contactar con el soporte?
          </div>
          <div class="collapse-content">
            <p>
              Puedes comunicarte con nuestro equipo de soporte a través de nuestro formulario de contacto en línea o llamándonos directamente; estamos aquí para ayudarte en todo lo que necesites.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</main>
@endsection