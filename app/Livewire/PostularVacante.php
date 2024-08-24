<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class PostularVacante extends Component
{

    use WithFileUploads;

    public $cv;
    public $vacante;

    protected $rules=[
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante){

        /* Estamos definiendo el valor de la componente que en este caso se esta pasando por el liveWire */
        $this->vacante=$vacante;
    }

    public function postularme(){

        $datos=$this->validate();

        //Almacenar CV en el disco duro

        $cv=$this->cv->store('public/cv');

        /* En este caso la parte de el nombre de cv , lo estamos almacenando en esta variable. */
        $datos['cv']=str_replace('public/cv/','',$cv);
        
        
        //Crear la vacante
        /* Podemos empezar a registrar los candidatos a esta vacante */
        /* Aqui vamos a colocar la parte de los candidatos */
        $this->vacante->candidatos()->create([
            'user_id'=>auth()->user()->id,
            'cv'=>$datos['cv']
        ]);
      

        //Crear notificación y enviar el email


        /* Creando notificacion */

        /* Esto hace la creación de la parte de Nuevo Usuario, que permite obtener y enviar Email. Según al usuario despues de mandar o hacer el Envio en el CV */
        /* Al parecer la automatización de la parte de lreclutador que esta tomando al modelo y los datos del Candidatos y el email lo hace por aqui */
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id,$this->vacante->titulo,auth()->user()->id));


        //Mostrar el usuario un mensaje de ok

        session()->flash('mensaje','Se envió correctamente tu información, mucha suerte');

        return redirect()->back();


    }


    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
