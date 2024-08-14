<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;

class CrearVacante extends Component
{

    public function render()
    {

        /* Creaciòn del modelo para poder pasar la variable de la base de datos correspondiente */

        /* Obtener las columnas de toda la tabla */
        /* Al parecer hno ha sido necesario crear una estructura */
        $salarios=Salario::all();
        $categorias=Categoria::all();

        return view('livewire.crear-vacante',[
            'salarios'=>$salarios,
            'categorias'=>$categorias
        ]);
        
    }
}
