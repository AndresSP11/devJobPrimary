<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        ///* Luego observar esta parte en el video 240*/
        /* En este caso para ler las notificaciones */
        $notificaciones=auth()->user()->unreadNotifications;

        /* En este caso la parte de limpiar notificaciones */

        auth()->user()->unreadNotifications->markAsRead();


        return view('notificaciones.index',[
            'notificaciones'=>$notificaciones
        ]);
        
    }
}
