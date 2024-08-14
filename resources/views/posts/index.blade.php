<x-blueprint.app-layout>
    <div class="max-w-4xl mx-auto px-4">
        <a href="{{route('posts.create')}}" class="bg-green-400 p-1 m-2 rounded-md">Nuevo Post</a>
        <ul>
            @foreach ($posts as $post)
                <li>
                    <a href="{{route('posts.show',$post)}}">
                        {{$post->title}}
                    </a>
                </li>   
            @endforeach
        </ul>
        <div>
            @for ($i = 1; $i <= $count; $i++)
                <a href="{{route('posts.index',['page'=>$i])}}">{{$i}}</a>
            @endfor            
        </div>
        <div>
            {{$posts->links()}}
        </div>
        <br>
        <br>
        <small><i>* Tener en cuenta en este código, que si vamos a listar cosas con URL amigables, 
            los elementos de tipo arreglo, ejemplo $posts, se deben recorrer en singular $post, no con $p, $a, $b, etc</i></small>
    </div>
</x-blueprint.app-layout>