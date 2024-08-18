<?php
/* La componante ha sido cread aespecificamente para mostrar la vacantes */
namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacantes extends Component
{

    /* En este caso la parte de la prueba */

    /* Metodo de llamada en esta parte de Laravel */

    protected $listeners=['eliminarVacante'];
   
    /* En este caso estoy comentando lo siguiente debido por la parte
    de las $vacantes para poder determinar aquello...  */
  /*   public $vacantes; */
   /*  public function prueba($id){
        dd($id);
    }
 */
/* Aqui estamos idetnficadndo la parte del Modelo */
/* En este caso observamos que si se queire obtener el Modelo. tiene que tener identificado la variable parsada por parte de la vista
mandada */
    public function eliminarVacante(Vacante $id){

        $id->delete();

        return redirect()->route('vacantes.index');

    }


    public function render()
    {

        /* En esta parte es el renderizado mostrandose aqui */
        /* See eesta pasando la consulta necesaria por parte del auth */
        /* Aqui se esata haciendo la consulta necesaria para la autenticaciòn.  */
        /* Obtener de la tabla la parde los usuarios Id, determinando la parte de Usuario */
        $vacantes=Vacante::where('user_id',auth()->user()->id)->paginate(2);
        
        return view('livewire.mostrar-vacantes',[
            'vacantes'=>$vacantes
        ]);
    }
}
