<x-blueprint.app-layout>
    <div class="max-w-4xl mx-auto px-4">
        <a href={{route('posts.index')}} class="text-blue-400 font-weight-bold">VOLVER</a>
        <h1>Post #{{$post->id}}</h1>
        <div class="p-2">
            <p><b>Titulo:</b> {{$post->title}}</p>
            <p><b>Category: </b> {{$post->category}}</p>
            <p><b>Contenido: </b> {{$post->content}}</p>
        </div>
        <a href={{route('posts.edit',['post'=>$post->id])}} class="bg-yellow-500 text-black font-weight-bold">Editar</a>
        <form action={{route('posts.destroy', ['post'=>$post->id])}} method="POST">
            @csrf
            @method('DELETE')
            <button class="bg-red-500 text-black font-weight-bold">ELIMINAR</button>
        </form>
    </div>
</x-blueprint.app-layout>