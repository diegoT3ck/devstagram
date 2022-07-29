@extends('layouts.app')

@section('titulo')
    Pagina Principal
@endsection

@section('contenido')
{{-- :post="$posts" iteramos la variable que viene del controlador, aunque tambien se tiene que mover en el constructor --}}
    <x-listar-post :posts="$posts" />

@endsection