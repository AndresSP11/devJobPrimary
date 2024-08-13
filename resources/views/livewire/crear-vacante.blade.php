<form class="md:w-1/2">
    <div class="">
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />
        <x-text-input 
        id="titulo" 
        class="block mt-1 w-full" 
        type="text" 
        name="titulo" 
        :value="old('titulo')" 
        autocomplete="username"
        placeholder="Titulo Vacante"/>
        {{-- Se esta quitando la parte de required y autofocus debido a que la validación
        la estamos haciendo mediante LiveWire --}}
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        <select 
            name="salario" 
            id="salario"
            class="border-gray-300 w-full
            dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500
            dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="">--Selecciona un Rol--</option>
                <option value="1">Developer - Obtener Empleo</option>
                <option value="2">Recruiter - Publicar Empleos</option>
        </select>
    </div>

    <div class="mt-4">
        <x-input-label for="categoria" :value="__('Categoria')" />
        <select 
            name="categoria" 
            id="categoria"
            class="border-gray-300 w-full
            dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500
            dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="">--Selecciona una Categoria--</option>
                <option value="1">Developer - Obtener Empleo</option>
                <option value="2">Recruiter - Publicar Empleos</option>
        </select>
    </div>

    <div class="mt-4">
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input 
        id="empresa" 
        class="block mt-1 w-full" 
        type="text" 
        name="empresa" 
        :value="old('empresa')" 
        placeholder="Empresa: ej. Netflix, Uber, Shopify"/>
        {{-- Se esta quitando la parte de required y autofocus debido a que la validación
        la estamos haciendo mediante LiveWire --}}
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="ultimo_dia" :value="__('Último Día para postularse')" />
        <x-text-input 
        id="ultimo_dia" 
        class="block mt-1 w-full" 
        type="date" 
        name="ultimo_dia" 
        :value="old('ultimo_dia')" 
        />
        {{-- Se esta quitando la parte de required y autofocus debido a que la validación
        la estamos haciendo mediante LiveWire --}}
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="ultimo_dia" :value="__('Descripción Puesto')" />
        
        <textarea
        name="descripcion"
        placeholder="Descripción general del puesto, experiencia"
        class="border-gray-300 w-full
            dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500
            dark:focus:ring-indigo-600 rounded-md shadow-sm h-72">

        </textarea>
        {{-- Se esta quitando la parte de required y autofocus debido a que la validación
        la estamos haciendo mediante LiveWire --}}
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="">
        <x-input-label for="imagen" :value="__('Titulo Vacante')" />
        <x-text-input 
        id="titulo" 
        class="block mt-1 w-full" 
        type="file" 
        name="imagen" 
       />
        {{-- Se esta quitando la parte de required y autofocus debido a que la validación
        la estamos haciendo mediante LiveWire --}}
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <x-primary-button class="mt-4">
        Crear Vacante
    </x-primary-button> 
        
</form>