<div>

    <livewire:filtrar-vacantes/>

    <div class=" py-12">
        <div class=" max-w-7xl mx-auto">
            
            <h3 class=" font-extrabold text-4xl text-gray-200 mb-12">Nuestas Vacantes Disponibles</h3>
            <div class=" bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-200">
                @forelse ($vacantes as $vacante)
                    <div class=" md:flex md:justify-between md:items-center py-5">
                        <div>
                            <a class=" font-extrabold text-3xl" href=""> 
                                {{$vacante->titulo}}
                            </a>
                            <p class="">{{ $vacante->empresa }}</p>
                            <p class=" font-bold text-xs text-gray-900">
                                Ultimo dia para postularse:
                                <span>{{ $vacante->ultimo_dia->format('d/m/y') }}</span>
                            </p>
                        </div>
                        <div class=" mt-5 md:mt-0">
                            <a class=" bg-indigo-600 p-3 text-sm uppercase font-bold text-white rounded-lg " href="{{ route('vacantes.show',$vacante->id)}}"> Ver Vacante</a>
                        </div>
                    </div>
                @empty
                    <p class=" p-3 text-center text-sm text-gray-600">No hay vacantes aùn</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
