<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CrearVacante extends Component
{

    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    /* Aqui es la parte del uso de la Imagen o la subida de la imagen */
    use WithFileUploads;


    /* Por defecto va hacer que esto sea la parte dere required */
    protected $rules=[
        'titulo'=>'required|string',
        'salario'=>'required',
        'categoria'=>'required',
        'empresa'=>'required',
        'ultimo_dia'=>'required',
        'descripcion'=>'required',
        /* En esta parte el campo imagene tiene que ser Imagen para que detecte el valor  */
        'imagen'=>'required|image|max:1024'
    ];

    public function crearVacante(){
        /* En este caso tenemos aqui esto, la función esta aqui en la parte de Rule, 
        para que tome todo. */
        $datos=$this->validate();

        /* public/vacantes/wq677uRXIvZ2TODCrc87G0L9nvzIr4wwQkAu3oV3.jpg */
        $imagen=$this->imagen->store('public/vacantes');

        $nombre_imagen=str_replace('public/vacantes/','',$imagen);

        /* En este caso vamos a almacenar la parte de solo el nombre de la imagen definida */

        /* Creaciòn de la vacante definida */
        /* Almacenando la Vacante  */
        Vacante::create([
            /* En este caso , la parte de los datos.... le derecha se obtiene la variable definida por wire:live en el componente del livewire
            , mientras que en la parte de la izquierda es el nombre de la columna */
            'titulo' =>$datos['titulo'],
        'salario_id' =>$datos['salario'],
        'categoria_id' =>$datos['categoria'],
        'empresa' =>$datos['empresa'],
        'ultimo_dia' =>$datos['ultimo_dia'],
        'descripcion' =>$datos['descripcion'],
        'imagen' =>$nombre_imagen,
        'user_id' =>auth()->user()->id
        ]);

        /* Mostrando los mensajes */
        session()->flash('mensaje','La vacante se publicò correctamente');

        /*  Redireccionar los Usuarios */


        return redirect()->route('vacantes.index');


    }


    public function render()
    {

        /* Creaciòn del modelo para poder pasar la variable de la base de datos correspondiente */
        /* Obtener las columnas de toda la tabla */
        /* Al parecer hno ha sido necesario crear una estructura */
        
        /* LA PARTE DE CALDIAD */
        $salarios=Salario::all();

        $categorias=Categoria::all();

        return view('livewire.crear-vacante',[
            'salarios'=>$salarios,
            'categorias'=>$categorias
        ]);
        
    }
}
