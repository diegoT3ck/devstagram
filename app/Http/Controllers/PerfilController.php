<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(User $user) {
        return view('perfil.index');
    }
    public function store(Request $request, User $user) {
        
        $request->request->add(['username' => Str::slug($request->username) ]);//reescribir el Request 
        // in:string obligatorio
        $this->validate($request, [ 
            'username' => 'required', 'unique:users,username,'.auth()->user()->id, 'min:3', 'max:20', 'not_in:twitter,editar-perfil'
        ]);
        if ($request->imagen) {
            $imagen = $request->file('imagen');
            // $input = $request->all();
    
            $nombreImagen = Str::uuid(). "." . $imagen->extension();
            
            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000,1000);

            $imagenPath = public_path('perfiles'. '/' . $nombreImagen);
            $imagenServidor->save($imagenPath);
        }
        
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        //la imagen de el usuario sera = a $nombreImagen O si esta la imagen determinada O estara vacio 
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        $usuario->save();
        //sail artisan make:migration add_imagen_field_to_users_table<-- Creamos las migraciones
        return redirect()->route('post.index', $usuario->username);
    }
}
