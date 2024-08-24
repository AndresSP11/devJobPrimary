<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    {{-- @if (count($vacantes)>0) --}}
    
        @forelse ( $vacantes as $vacante )
                <div class=" p-6 text-gray-900 dark:text-gray-100 md:flex md:justify-between">
                    <div class="">
                        
                        <a href="{{route('vacantes.show',$vacante->id)}}" class=" text-xl font-bold">
                            {{ $vacante->titulo }}
                        </a>
                        
                        <p class=" text-sm font-bold text-gray-200 ">{{ $vacante->empresa}}</p>
                        <p class=" text-sm text-gray-300">Ùltimo Dìa: {{ $vacante->ultimo_dia->format('d/m/Y')}}</p>
                    </div>

                    <div class="flex flex-col md:flex-row gap-3 mt-2 md:mt-2 ">
                        
                        <a href="{{route('candidatos.index',$vacante)}}" 
                        class=" bg-slate-300 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center md:h-8">
                            Candidatos
                        </a>
                        {{-- Pasandolo la parte de vacante --}}
                        <a href="{{route('vacantes.edit',$vacante->id)}}" 
                        class=" bg-blue-500 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center md:h-8">
                            Editar
                        </a>
                        {{-- Aqui vamos a colocar un eventos de forma de click, recordar el wire:click
                       que se va obtener en este caso.  --}}
                        <button 
                        {{-- En este caso estamos haciendo la parte de $Vacante id --}}
                        wire:click="$dispatch('mostrarAlerta',{id:{{$vacante->id}}})" 
                        class=" bg-red-500 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center md:h-8">
                            Eliminar
                        </button>
                        
                    </div>
                </div>
            @empty
                <p class=" p-2 font-bold text-slate-200 px-5 text-center">No hay vacantes que Mostrar</p>    
            @endforelse

            <div class=" mb-3 px-6">
                {{$vacantes->links()}}
            </div>
            
{{--  @endif --}}
</div>
{{-- Activar la paginaciòn --}}


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11">
            
    </script>
   
   <script>
        Livewire.on('mostrarAlerta',vacanteId=>{
            
            Swal.fire({  
            title: "¿Eliminar Vacante?",
            text:"Una vacante eliminada no se puede recuperar",
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: "Si, !Eliminar!",
            denyButtonText: `Cancelar`
            }).then((result) => {
           
            if (result.isConfirmed) {
                /* Recuerda que en este caso solo estmaos pasando la vacanteId */
                Livewire.dispatch('eliminarVacante',vacanteId);

                Swal.fire("Eliminado Correctamente!", "", "success");
            } else if (result.isDenied) {
                Swal.fire("Changes are not saved", "", "info");
            } 
        });
    });  
        
   </script>
@endpush






