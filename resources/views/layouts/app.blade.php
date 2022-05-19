<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devstagram - @yield('titulo')</title>
    <link rel="stylesheet" src="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}" defer></script>
</head>
<body class="bg-gray-500">
{{--     <nav>
        <a href="/">Principal</a>
        <a href="/nosotros">Nosotros</a>
        <a href="/tienda">Tienda</a>
    </nav>   --}}
    <header class="p-5 border-b bg-white shadow">
        <h1 class="text-3xl font-black">Devstagram</h1>
    </header>
    @yield('contenido')
    

</body>
</html>