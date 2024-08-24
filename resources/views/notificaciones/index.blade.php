<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Aqui ejecutamos la parte del liveWire --}}
                    <h1 class=" text-4xl font-bold text-center mb-10">Mis Notificaciones</h1>
                    {{-- Almacenando la parte de lIVEWIRE --}}
                    {{-- En este lado se pasa la creación  --}}
                    {{-- <div class=" md:flex md:justify-center p-5">
                        <livewire:crear-vacante/>
                    </div> --}}
                    @forelse($notificaciones as $notificacion)
                        <div class=" p-5 border border-gray-200 flex lg:justify-between     lg:items-center">
                            <div>
                                <p>Tienes un nuevo candidatos en:
                                    <span> {{ $notificacion->data['nombre_vacante'] }}</span>
                                    
                                </p>
                                <p>Hace:
                                    <span> {{ $notificacion->created_at->diffForHumans() }}</span>
                                    
                                </p>
                            </div>
                            <div>
                                <a href="{{ route('candidatos.index',$notificacion->data['id_vacante']) }}" class=" bg-teal-500 p-3 text-sm uppercase font-bold mt-5g">
                                    Ver Candidatos
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-600">No hay Notificaciones Nuevas</p>
                    @endempty

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
