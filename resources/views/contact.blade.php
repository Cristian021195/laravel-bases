<x-blueprint.app-layout>
    <div class="max-w-4xl mx-auto px-4">
        <h1>Bienvenido a Contact</h1>
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
    </div>
</x-blueprint.app-layout>