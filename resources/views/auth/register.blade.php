@extends('layouts.app')
@section('titulo')
    Registrate en DevStagram
@endsection

@section('contenido')
    <div class="md:flex">
        <div class="md:w-1/2">
            <p>Imagen aqui</p>
        </div>
        <div class="md:w-1/2">
            <form action="">
                <div class="mb-5">
                    <label for="name" class="mb-3 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input 
                    id="name"
                    name="text"
                    type="text"
                    placeholder="Tu nombre" 
                    class="border p-3 w-full rounded-lg"
                    >
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-3 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input 
                    id="username"
                    name="username"
                    type="text"
                    placeholder="Tu nombre" 
                    class="border p-3 w-full rounded-lg"
                    >
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-3 block uppercase text-gray-500 font-bold">
                        E-mail
                    </label>
                    <input 
                    id="email"
                    name="email"
                    type="email"
                    placeholder="Tu e-mail" 
                    class="border p-3 w-full rounded-lg"
                    >
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-3 block uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input 
                    id="password"
                    name="password"
                    type="email"
                    placeholder="Tu Password" 
                    class="border p-3 w-full rounded-lg"
                    >
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-3 block uppercase text-gray-500 font-bold">
                        Repetir Password
                    </label>
                    <input 
                    id="password_confirmation"
                    name="password_confirmation"
                    type="email"
                    placeholder="Repite tu Password" 
                    class="border p-3 w-full rounded-lg"
                    >
                </div>
                <input 
                value="Registrar"
                type="submit">
            </form>
        </div>
    </div>
@endsection