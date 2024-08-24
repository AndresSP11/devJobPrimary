<div class=" bg-gray-500 p-5 mt-10 flex flex-col justify-center items-center rounded-xl">
    <h3 class=" p-2 font-bold text-gray-100 text-2xl my-4">Postularme a esta vacante</h3>

    @if(session()->has('mensaje'))
        <div class=" uppercase border border-green-400 bg-green-100 text-emerald-400 font-bold p-5 rounded-2xl">
            {{ session('mensaje') }}
        </div>

    @else

        <form class="w-96 mt-5" wire:submit.prevent='postularme'>
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum o Hoja de Vida (PDF)')"/>
                <x-text-input id="cv" type="file" accept=".pdf" wire:model="cv"/>

                
            </div>

            @error('cv')

                <livewire:mostrar-alerta :message="$message">

            @enderror

            <x-primary-button class=" mt-3">
                {{__("Postular a la Vacante")}}
            </x-primary-button>        
        </form>
    @enderror
    
</div>
