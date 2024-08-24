<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\Attributes\On; 

class HomeVacantes extends Component
{

    protected $termino;
    protected $categoria;
    protected $salario;


    protected $listeners=['terminosBusqueda'=>'buscar'];
    #[On('terminosBusqueda')]
    public function buscar($termino,$categoria,$salario) {
        $this->termino = $termino;
        $this->categoria = $categoria;
        $this->salario = $salario;

    /* dd("Enviando ahora desde el padre: Término-$termino salario $salario categoria $categoria"); */
}



    public function render()
    {

         
        $vacantes=Vacante::when($this->termino,function($query){
            $query->where('titulo','LIKE',"%".$this->termino."%");
        })
        ->when($this->categoria,function($query){
            $query->where('categoria_id',$this->categoria);
        })
        ->when($this->salario,function($query){
            $query->where('salario_id',$this->salario);
        })->paginate    (2);


        return view('livewire.home-vacantes',[
            'vacantes'=>$vacantes
        ]);
    }
}
