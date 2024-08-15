<form class="md:w-1/2" wire:submit.prevent='crearVacante'>
    <div class="">
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />
        <x-text-input 
        id="titulo" 
        class="block mt-1 w-full" 
        type="text" 
        wire:model="titulo" 
        :value="old('titulo')" 
        autocomplete="username"
        placeholder="Titulo Vacante"/>
        {{-- Se esta quitando la parte de required y autofocus debido a que la validación
        la estamos haciendo mediante LiveWire --}}
        @error('titulo')
        {{-- El message es la parte donde se tiene la o el mensaje de Error --}}
            
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div class="mt-4">
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        <select 
            name="salario" 
            id="salario"
            wire:model='salario'
            class="border-gray-300 w-full
            dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500
            dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="">--Selecciona un Rol--</option>
                @foreach ($salarios as $salario)
                    <option value="{{$salario->id}}">{{$salario->salario}}</option>
                @endforeach
        </select>
        @error('salario')
        {{-- El message es la parte donde se tiene la o el mensaje de Error --}}
            
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div class="mt-4">
        <x-input-label for="categoria" :value="__('Categoria')" />
        <select 
            name="categoria" 
            id="categoria"
            wire:model="categoria"
            class="border-gray-300 w-full
            dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500
            dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="">--Selecciona una Categoria--</option>
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                @endforeach
        </select>
        @error('categoria')
        {{-- El message es la parte donde se tiene la o el mensaje de Error --}}
            
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div class="mt-4">
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input 
        id="empresa" 
        class="block mt-1 w-full" 
        type="text" 
        wire:model="empresa" 
        :value="old('empresa')" 
        placeholder="Empresa: ej. Netflix, Uber, Shopify"/>
        {{-- Se esta quitando la parte de required y autofocus debido a que la validación
        la estamos haciendo mediante LiveWire --}}
        @error('empresa')
        {{-- El message es la parte donde se tiene la o el mensaje de Error --}}
            
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
            
    </div>

    <div class="mt-4">
        <x-input-label for="ultimo_dia" :value="__('Último Día para postularse')" />
        <x-text-input 
        id="ultimo_dia" 
        class="block mt-1 w-full" 
        type="date" 
        wire:model="ultimo_dia" 
        :value="old('ultimo_dia')" 
        />
        {{-- Se esta quitando la parte de required y autofocus debido a que la validación
        la estamos haciendo mediante LiveWire --}}
        @error('ultimo_dia')
        {{-- El message es la parte donde se tiene la o el mensaje de Error --}}
            
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div class="mt-4">
        <x-input-label for="ultimo_dia" :value="__('Descripción Puesto')" />
        <textarea
        name="descripcion"
        placeholder="Descripción general del puesto, experiencia"
        wire:model="descripcion"
        class="border-gray-300 w-full
            dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500
            dark:focus:ring-indigo-600 rounded-md shadow-sm h-72">
        </textarea>
        {{-- Se esta quitando la parte de required y autofocus debido a que la validación
        la estamos haciendo mediante LiveWire --}}
        @error('descripcion')
        {{-- El message es la parte donde se tiene la o el mensaje de Error --}}
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>



    <div class="">
        <x-input-label for="imagen" :value="__('Titulo Vacante')" />
        <x-text-input 
        id="imagen" 
        class="block mt-1 w-full" 
        type="file" 
        name="imagen" 
        wire:model="imagen"
        accept="image/*"
       />

       <div class="my-5">
        {{-- Imagen es la variable de livewire del model Imagen --}}
            @if($imagen)
                    Imagen:
                    <img src="{{ $imagen->temporaryUrl() }}" alt="">
            @endif
       </div>
        {{-- Se esta quitando la parte de required y autofocus debido a que la validación
        la estamos haciendo mediante LiveWire --}}
        @error('imagen')
        {{-- El message es la parte donde se tiene la o el mensaje de Error --}}
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
        {{-- En este caso la parte de las millas  --}}



    </div>



    <x-primary-button class="mt-4">
        Crear Vacante
    </x-primary-button> 
    
</form>