<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
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
    </div>

</body>
</html>