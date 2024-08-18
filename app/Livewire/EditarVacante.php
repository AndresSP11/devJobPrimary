<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditarVacante extends Component
{

    public $vacante_id;

    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;    
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    public $imagen_nueva;

    use WithFileUploads;

    protected $rules=[
        'titulo'=>'required|string',
        'salario'=>'required',
        'categoria'=>'required',
        'empresa'=>'required',
        'ultimo_dia'=>'required',
        'descripcion'=>'required',
        'imagen_nueva'=>'nullable|image|max:1024'
        /* En esta parte el campo imagene tiene que ser Imagen para que detecte el valor  */
        /* SE COMENTA ESATA LINEA DEBIDO A QUEQ PUEDE O NO TENER LA IAMGEN CORRESPONDIDA. */
        /* 'imagen'=>'required|image|max:1024' */
    ];

    public function mount(Vacante $vacante){

        $this->vacante_id=$vacante->id;

        $this->titulo=$vacante->titulo;
        $this->salario=$vacante->salario_id;
        $this->categoria=$vacante->categoria_id;
        $this->empresa=$vacante->empresa;
        $this->ultimo_dia=Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
        $this->descripcion=$vacante->descripcion;
        $this->imagen=$vacante->imagen;
        

    }

    public function editarVacante(){

        /* Mandando la validaciòn */
        $datos=$this->validate(); //Aqui se va enviar $Rules

        // Si hay una nueva imagen
        /* En este caso sta verificando si se ha colcoado algo en la nueva imagen */
        if($this->imagen_nueva){
            /* Recordar que la parte de Store, se va almacenar una nueva variable qeu la misma función genera. No olvidar esa parte */
            $imagen=$this->imagen_nueva->store('public/vacantes');
            $datos['imagen']=str_replace('public/vacantes/','',$imagen);
        }

        // Encontrar la vacante a editar

        $vacante=Vacante::find($this->vacante_id);

        // Asignar los valores
        /* Aqui se aplica la reasignación de los valores definidos al inicio o que se encuentran a la base de datos con los mandado nuevamente */
        $vacante->titulo=$datos['titulo'];
        $vacante->salario_id=$datos['salario'];
        $vacante->categoria_id=$datos['categoria'];
        $vacante->empresa=$datos['empresa'];
        $vacante->ultimo_dia=$datos['ultimo_dia'];
        $vacante->descripcion=$datos['descripcion'];
        /* Verificador si existe algo nuevo o asignarle el valor antiguo */
        $vacante->imagen=$datos['imagen'] ?? $vacante->imagen;
        // Guardar la vacante

        $vacante->save();
    

        // Redireccionar

        session()->flash('mensaje','La Vacante se actualizò Correctamente');

        return redirect()->route('vacantes.index');




    }


    public function render()
    {


        $salarios=Salario::all();
        $categorias=Categoria::all();

        return view('livewire.editar-vacante',[
            'salarios'=>$salarios,
            'categorias'=>$categorias
            
        ]);
    }



    
}
