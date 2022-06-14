@extends('layouts.app')

@section('titulo')
Perfil: {{$user->username}}
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                @if($user->imagen)  <img src="perfiles/{{$user->imagen}}" alt="Imagen de Perfil">
                @else  <img src="{{asset('img/usuario.svg')}}" alt="Imagen de Perfil">
                @endif
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
                <div class="flex items-center gap-2">
                    <p class="text-gray-700 text-xl"> {{ $user->username }}</p>
                    @auth
                        @if ($user->id === auth()->user()->id)
                            <a href="{{route('perfil.index')}}"
                            class="text-gray-400 hover:text-gray-600 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                  </svg>
                            </a>
                        @endif
                    @endauth
                </div>

                <p class="text-gray-800 text-sm mb-5 font-bold mt-5">
                    0
                    <span class="font-normal">Seguidores</span>
                </p>
                <p class="text-gray-800 text-sm mb-5 font-bold">
                    0
                    <span class="font-normal">Siguiendo</span>
                </p>
                <p class="text-gray-800 text-sm mb-5 font-bold">
                    {{$posts->count()}}
                    <span class="font-normal">Post</span>
                </p>
                <form action="{{ route('users.follow', $user->username) }}" method="POST">
                    @csrf
                    <input type="submit"
                    class="bg-blue-600 text-white uppercase rounded-lg py-1 px-3 text-xs font-bold cursor-pointer"
                    value="Seguir"
                    >
                    
                </form>
            </div>
        </div>
        
    </div>

        <section class="container mx-auto mt-10">
            <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
            @if ($posts->count())
                
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach ($posts as $post )
                <div>
                    <a href="{{ route('post.show', ['post' => $post, 'user'=> $user]) }}">
                        <img src="{{ asset('uploads') . '/' . $post->imagen}}" alt="Imagen del post {{$post->titulo}}">
                    </a>
                </div>
            @endforeach
        </div>
        <div class="my-10">
            {{$posts->links()}}
        </div>
        @else
        <p  class="text-gray-600 uppercase text-sm text-center fount-bold"> No hay Posts</p>
        @endif

        </section>
@endsection
