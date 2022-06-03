<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devstagram - @yield('titulo')</title>
    @stack('styles')
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <script src="{{asset('js/app.js')}}" defer></script>
</head>
<body class="bg-gray-100">
    <header class="p-5 border-b bg-white ">
        <div class="container mx-auto flex items-center justify-between">
            <h1 class="flex text-3xl font-black">
                Devstagram
            </h1>
            <nav class="flex items-center ">
                @auth
                <a  
                class="flex items-center gap-2 bg-waith border p-2 text-gray-600 rounded text-sm uppercase font-bold cursor-pointer"
                href="{{ route('post.create') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4 5a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V7a2 2 0 00-2-2h-1.586a1 1 0 01-.707-.293l-1.121-1.121A2 2 0 0011.172 3H8.828a2 2 0 00-1.414.586L6.293 4.707A1 1 0 015.586 5H4zm6 9a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                  </svg>Crear
                </a>
                <a class="font-bold  text-gray-600 text-sm" href="{{route('post.index', auth()->user()->username)}}">Hola 
                    <span class="font-normal">
                        {{auth()->user()->username}}
                    </span>
                         </a>
                         <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button type="submit" class="font-bold uppercase text-gray-600 text-sm">
                                Crear Session
                            </button>
                        </form>
                @endauth
                @guest
                <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('login')}}">Login</a>
                <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('register')}}">Crear Cuenta</a>
                @endguest

            </nav>
        </div>
    </header>
    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">    
            @yield('titulo')        
        </h2>
        @yield('contenido')
    </main>
    <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
        DevStagram - Todos los derechos reservdos {{ now()->year }}
    </footer>
        {{-- <h1 class="text-2xl" >@yield('titullo')</h1><hr> --}}

</body>
</html>