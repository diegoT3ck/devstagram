<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function store(User $user) {

        // Cuando relacionas con tablas o con la misma tabla
        // $user->followers->attach(); <-- ASi te permite acceder a la informacion
        $user->followers()->attach( auth()->user()->id); // <-- Pero asi te permite acceder al metodo
        // $user -> El usuario que estamos visitando
        // followers()->attach -> Esta haciendo la funcion de seguir accediendo al modelo
        //  auth()->user()->id -> La persona autenticada
        return back();
    }
    public function destroy(User $user) {
        // Detach es para eliminar
        $user->followers()->detach( auth()->user()->id );
        return back();

    }
}
