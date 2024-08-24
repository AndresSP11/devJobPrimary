<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Candidatos Vacante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Aqui ejecutamos la parte del liveWire --}}
                    <h1 class=" text-4xl font-bold text-center mb-10">Candidatos Vacante:
                    {{ $vacante->titulo }}</h1>
                    {{-- Almacenando la parte de lIVEWIRE --}}
                    {{-- En este lado se pasa la creación  --}}
                    <div class=" md:flex md:justify-center p-5">
                        <ul class=" divide-y divide-gray-200">
                            @forelse ($vacante->candidatos as $candidato )
                                <li class=" p-3 flex items-center">
                                    <div class=" flex-1">
                                        <pre>
                                            {{$candidato->user}}
                                        </pre>
                                    </div>

                                    <div>

                                    </div>
                                </li>
                            @empty
                                <p class=" p-3 text-center text-sm text-gray-600">No hay candidatos aún...</p>
                            @endforelse
                        </ul>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
