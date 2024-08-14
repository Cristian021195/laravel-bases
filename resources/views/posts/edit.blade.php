<x-blueprint.app-layout>
    <h1>Editar post #{{$post->id}}</h1>
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
    <!-- version anterior a validaciones: <form action=route('posts.update', ['post'=>$post->id]) method="POST" class="p-4 row">-->
    <form action={{route('posts.update', $post)}} method="POST" class="p-4 row">
        @csrf
        @method('PUT')
        <label for="title">Titulo: </label>
        <input type="text" name="title" id="title" class="bg-slate-300 w-full" value="{{old('title', $post->title)}}">
        @error('title')
            <p class="text-red-500">{{$message}}</p>
        @enderror
        <br><br>

        <label for="title">Slug: </label>
        <input type="text" name="slug" id="slug" class="bg-slate-300 w-full" value="{{old('slug',$post->slug)}}">
        @error('slug')
            <p class="text-red-500">{{$message}}</p>
        @enderror
        <br><br>

        <label for="category">Categoria: </label>
        <input type="text" name="category" id="category" class="bg-slate-300 w-full" value="{{old('category',$post->category)}}">
        @error('category')
            <p class="text-red-500">{{$message}}</p>
        @enderror
        <br><br>

        <label for="content">Contenido: </label>
        <textarea name="content" id="content" cols="30" rows="10" class="bg-slate-300 w-full">{{old('content',$post->content)}}</textarea>
        @error('content')
            <p class="text-red-500">{{$message}}</p>
        @enderror
        <br><br>

        <input type="hidden" name="id" value="{{$post->id}}">
        <button type="submit" class="bg-red-300 text-slate-100 font-weight-bold w-full">Actualizar Post</button>
    </form>
</body>
</x-blueprint.app-layout>