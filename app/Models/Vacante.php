<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;

    
    /* La parte de los casts es donde la columna de ultimo_dia se pasa por ahì */

    protected $casts = [ 'ultimo_dia'=>'date'];


    protected $fillable=[
        'titulo',
        'salario_id',
        'categoria_id',
        'empresa',
        'ultimo_dia',
        'descripcion',
        'imagen',
        'user_id'
    ];

    /* En este caso cuando nosotros tenemos uyna varaible de la parte de la vacante, no tenmos como mostrar los datos, pero 
    tenemos que crear la relaciòn generada para mandarleaqui */

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function salario(){
        return $this->belongsTo(Salario::class);    
    }

    public function candidatos(){
        /* En este caso significa que una vacante tiene muchos candidatos se va obtener todo los candidatos*/
        return $this->hasMany(Candidato::class)->orderBy('created_at','DESC');
    }

    public function reclutador(){
        /* En este caso estamos obteniendo el user_id de LA COLUMANA de vacante*/
        return $this->belongsTo(User::class,'user_id');
    }


}
