<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    @if ($vacantes)
    
        @foreach ( $vacantes as $vacante )
        <div class=" p-6 text-gray-900 dark:text-gray-100 md:flex md:justify-between">
            <div class="">
                
                <a href="#" class=" text-xl font-bold">
                    {{ $vacante->titulo }}
                </a>
                
                <p class=" text-sm font-bold text-gray-200 ">{{ $vacante->empresa}}</p>
                <p class=" text-sm text-gray-300">Ùltimo Dìa: {{ $vacante->ultimo_dia->format('d/m/Y')}}</p>
            </div>

            <div class="flex flex-col md:flex-row gap-3 mt-2 md:mt-2 ">
                
                <a href="#" 
                class=" bg-slate-300 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center md:h-8">
                    Candidatos
                </a>
                <a href="#" 
                class=" bg-blue-500 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center md:h-8">
                    Editar
                </a>
                <a href="#" 
                class=" bg-red-500 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center md:h-8">
                    Eliminar
                </a>
                
            </div>
        </div>
        @endforeach
    @else
        <p>No hay vacantes que Mostrar</p>
    @endif
</div>