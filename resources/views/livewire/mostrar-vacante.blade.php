<div class=" p-10">
    <div class=" mb-5">
        <h3 class=" font-bold text-3xl text-slate-200 my-3">
            {{$vacante->titulo}}
        </h3>

        <div class=" md:grid md:grid-cols-2">
            <p class=" font-bold text-sm uppercase text-gray-100 my-3">
                <span class=" text-slate-200">{{$vacante->empresa}}</span>
            </p>
            <p class=" font-bold text-sm uppercase text-gray-100 my-3">Ùltimo dìa para postularse:
                <span class=" text-slate-200">{{Carbon\Carbon::parse( $vacante->ultimo_dia)->toFormattedDateString()}}</span>
            </p>
            <p class=" font-bold text-sm uppercase text-gray-100 my-3">Categoria:
                <span class=" text-slate-200">{{$vacante->categoria->categoria}}</span>
            </p>
            <p class=" font-bold text-sm uppercase text-gray-100 my-3">Salario:
                <span class=" text-slate-200">{{$vacante->salario->salario}}</span>
            </p>
        </div>
    </div>

    <div class=" md:grid md:grid-cols-6 gap-8">
        <div class=" col-span-2">
            <img src="{{ asset('storage/vacantes/'.$vacante->imagen)}}" alt="{{'Imagen vacante'.$vacante->titulo}}">
        </div>
        <div class=" col-span-4">
            <h2 class=" text-2xl font-bold mb-5 text-gray-100">Descripcion del Puesto</h2>
            <p class=" font-bold text-sm uppercase text-gray-100 my-3">Descripcion:
                <span class=" text-slate-200">{{$vacante->descripcion}}</span>
            </p>
        </div>
    </div>
    @guest
        <div class=" mt-5 bg-gray-50 border border-dashed p-5 text-center rounded-xl">
            <p>
                ¿Deseas aplicar a esta vacante? <a href="" class="font-bold text-indigo-300">Obten una cuenta y aplica a esta y otras vacantes</a>
            </p>
        </div>
    @endguest
</div>
