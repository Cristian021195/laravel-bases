@extends('layouts.app')
@section('title', 'Homepage')
@push('css')
    <style>
        body{background-color: #e4e4e4}
    </style>    
@endpush
@section('content')
    <div class="max-w-4xl mx-auto px-4">
        <h1>Bienvenido a About</h1>
        <x-ui.alert type="danger">
            <x-slot name="title">ERROR</x-slot>
            Componente anonimo #1
        </x-ui.alert>
        <x-ui.alert-alt type="success" class="my-4">
            <x-slot name="title">ERROR</x-slot>
            Componente anonimo #2 con merge de class attribute
        </x-ui.alert-alt>
        <x-calert type="warning" class="my-4">
            <x-slot name="title">WARNING</x-slot>
            Componente de clase #3 con logica separada de vista
        </x-calert>
        <div class="p-4">
            En caso de tener sections de mas de un elemento hacemos, con los @ respectivos
            <pre>
                @@section('title')
                    Homepage
                @@endsection
            </pre>

            <p class="rojo">La diferencia entre @@stack y @@yield, es que cuando usamos yield solo podemos referenciarlo
            con un unico section.</p>
            <p class="rojo">stack nos permite apilar mas de un elemento para agregar, ingluso del mismo tipo al final del documento
                o sea, cada vez que llamamos stack en la vista en cuestion, se va apilando.</p><br>
            <p>En resumen</p>
            <ul>
                <li>Usamos <b>yield</b> cuando el contenido variable sea unico</li>
                <li>Usamos <b>push</b> cuando el contenido variable pueda cambiarse y agregarse donde se requiera</li>
            </ul>
        </div>
    </div>
    @push('css')
    <style>
        .rojo{color: rgb(165, 0, 0)}
    </style>    
    @endpush
@endsection