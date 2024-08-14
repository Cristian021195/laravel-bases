<x-blueprint.app-layout>
    <h1>Nuevo post</h1>
    @if ($errors->any())
        <div>
            <h2>Errores: </h2>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action={{route('posts.store')}} method="POST" class="p-4 row">
        @csrf
        <label for="title">Titulo: </label>
        <input type="text" name="title" id="title" class="bg-slate-300 w-full" value="{{old('title')}}">
        @error('title')
            <p class="text-red-500">{{$message}}</p>
        @enderror
        <br><br>

        <label for="title">Slug: </label>
        <input type="text" name="slug" id="slug" class="bg-slate-300 w-full" value="{{old('slug')}}">
        @error('slug')
            <p class="text-red-500">{{$message}}</p>
        @enderror
        <br><br>

        <label for="category">Categoria: </label>
        <input type="text" name="category" id="category" class="bg-slate-300 w-full" value="{{old('category')}}">
        @error('category')
            <p class="text-red-500">{{$message}}</p>
        @enderror
        <br><br>

        <label for="content">Contenido: </label>
        <textarea name="content" id="content" cols="30" rows="10" class="bg-slate-300 w-full">{{old('content')}}</textarea>
        @error('content')
            <p class="text-red-500">{{$message}}</p>
        @enderror
        <br><br>
        <button type="submit" class="bg-red-300 text-slate-100 font-weight-bold">Enviar</button>
    </form>
</body>
</x-blueprint.app-layout>