<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacantes extends Component
{
    /* En este caso estoy comentando lo siguiente debido por la parte
    de las $vacantes para poder determinar aquello...  */
  /*   public $vacantes; */

    public function render()
    {

        /* En esta parte es el renderizado mostrandose aqui */
        /* See eesta pasando la consulta necesaria por parte del auth */
        /* Aqui se esata haciendo la consulta necesaria para la autenticaciòn.  */
        /* Obtener de la tabla la parde los usuarios Id, determinando la parte de Usuario */
        $vacantes=Vacante::where('user_id',auth()->user()->id)->paginate();
        
        return view('livewire.mostrar-vacantes',[
            'vacantes'=>$vacantes
        ]);
    }
}
