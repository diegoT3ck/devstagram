<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function  __construct()
    {
        //Solo los usuarios autenticados pueden ver el contenido a excepcion de algunos metodos
        $this->middleware('auth')->except(['show', 'index']);
    } 
    
    public function index(User $user) {
        // $posts = Post::where('user_id', $user->id)-get()
        $posts = Post::where('user_id', $user->id)->paginate(12);

        return view('layouts.dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
    public function create() {
        return view('post.create');
    }
    public function store(Request $request) {
        //validacion
        $this->validate($request, [
            'titulo' => 'required', 
            'descripcion' => 'required', 
            'imagen' => 'required', 
        ]);
        //Creacion de Post
        // Post::create([
        //     'titulo' => $request->titulo,
        //     'descripcion' => $request->descripcion,
        //     'imagen' => $request->imagen,
        //     'user_id' => auth()->user()->id,
        // ]);

        //Otra forma
        // $post = new Post;
        // $post->titulo = $request->titulo;
        // $post->descripcion = $request->descripcion;
        // $post->imagen = $request->imagen;
        // $post->user_id = auth()->user()->id;
        // $post->save();

        //Guardar registro usando las relaciones
        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('post.index', auth()->user()->username );

    }
    public function show(User $user, Post $post) {
        return view('post.show', [
            'post' => $post,
            'user' => $user
        ]);
    }
}
