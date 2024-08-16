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


}
