@extends('layouts.app')
@section('contact')
<main class="container max-w-screen-xl mx-auto flex flex-col my-20 gap-10 min-h-screen">
    <section class="bg-base-100">
        <div class="container px-6 py-12 mx-auto">
            <div>
                <p class="text-sm text-gray-400">Contacto</p>
                <p class="text-4xl font-bold text-indigo-700 mb-2">Contáctanos</p>
                <h1 class="mt-2 text-xl font-semibold text-base-content md:text-xl">Consulta tus dudas con nosotros</h1>
                <p class="mt-3 text-sm">Por favor, rellena este formulario o envíanos un correo electrónico.</p>
            </div>

            <div class="grid grid-cols-1 gap-12 mt-10 lg:grid-cols-2">
                <div class="grid grid-cols-1 gap-12 md:grid-cols-2">
                    <div>
                        <span class="inline-block p-3 text-primary rounded-full bg-primary/20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                        </span>
                        <h2 class="mt-4 text-base font-medium text-base-content">Correo electrónico</h2>
                        <p class="mt-2 text-sm text-base-content/70">Nuestro equipo está aquí para ayudarte.</p>
                        <p class="mt-2 text-sm text-primary">info@fundacreativa.es</p>
                    </div>

                    <div>
                        <span class="inline-block p-3 text-primary rounded-full bg-primary/20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
                            </svg>
                        </span>
                        <h2 class="mt-4 text-base font-medium text-base-content">Chat en vivo</h2>
                        <p class="mt-2 text-sm text-base-content/70">Nuestro equipo está aquí para ayudarte.</p>
                        <p class="mt-2 text-sm text-primary">Iniciar nuevo chat</p>
                    </div>

                    <div>
                        <span class="inline-block p-3 text-primary rounded-full bg-primary/20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                        </span>
                        <h2 class="mt-4 text-base font-medium text-base-content">Oficina</h2>
                        <p class="mt-2 text-sm text-base-content/70">Ven a saludarnos a nuestra oficina central.</p>
                        <p class="mt-2 text-sm text-primary">Calle Gran Vía, 28, 28013 Madrid, España</p>
                    </div>

                    <div>
                        <span class="inline-block p-3 text-primary rounded-full bg-primary/20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg>
                        </span>
                        <h2 class="mt-4 text-base font-medium text-base-content">Teléfono</h2>
                        <p class="mt-2 text-sm text-base-content/70">Lun-Vie de 9:00 a 18:00.</p>
                        <p class="mt-2 text-sm text-primary">+34 912 345 678</p>
                    </div>
                </div>

                <div class="p-4 py-6 rounded-lg bg-base-200 md:p-8">
                    <form>
                        <div class="-mx-2 md:items-center md:flex">
                            <div class="flex-1 px-2">
                                <label class="block mb-2 text-sm text-base-content">Nombre</label>
                                <input type="text" placeholder="María" class="input input-bordered w-full" />
                            </div>
                            <div class="flex-1 px-2 mt-4 md:mt-0">
                                <label class="block mb-2 text-sm text-base-content">Apellidos</label>
                                <input type="text" placeholder="García" class="input input-bordered w-full" />
                            </div>
                        </div>
                        <div class="mt-4">
                            <label class="block mb-2 text-sm text-base-content">Correo electrónico</label>
                            <input type="email" placeholder="maria.garcia@ejemplo.com" class="input input-bordered w-full" />
                        </div>
                        <div class="w-full mt-4">
                            <label class="block mb-2 text-sm text-base-content">Mensaje</label>
                            <textarea class="textarea textarea-bordered w-full h-32 md:h-56" placeholder="Mensaje"></textarea>
                        </div>
                        <button class="btn btn-primary w-full mt-4">
                            Enviar mensaje
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
