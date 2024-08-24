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
                        <ul class=" divide-y divide-gray-200 w-full">
                            @forelse ($vacante->candidatos as $candidato )
                                <li class=" p-3 flex items-center">
                                    <div class=" flex-1">
                                        <p class=" text-xl font-medium text-gray-400">{{$candidato->user->name}}</p>
                                        <p class=" text-xl font-medium text-gray-400">{{$candidato->user->email}}</p>
                                        <p class=" text-xl font-medium text-gray-400">
                                                Dìa que Postulo: <span>{{$candidato->created_at->diffForHumans()}}</span></p>
                                    </div>

                                    <div>
                                        <a 
                                        class=" inline-flex items-center shadow-sm px-2 py-0.5 border border-gray-300 text-sm
                                        loading-5 font-medium bg-white hover:bg-gray-400 text-gray-900 rounded-xl"
                                        href="{{ asset('storage/cv/'.$candidato->cv) }}"
                                        target="_blank"
                                        rel="noreferrer noopener"
                                        >
                                            Ver CV
                                        </a>
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
