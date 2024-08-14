<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        //$posts = Post::orderBy('id','desc')->all();
        //$posts = Post::orderBy('id','desc')->get();
        $size = 4;
        $count = Post::count() % $size;
        $posts = Post::orderBy('id','desc')->paginate($size);
        
        return view('posts.index',[
            'posts'=> $posts,
            'count'=> $count,
        ]);// la notacion de accesso entre carpetas y archivos es con punto, no con /
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $req){
        /*try {//ejemplo normal
            $post = new Post();
            $post->title = $req->title;
            $post->slug = $req->slug;
            $post->category = $req->category;
            $post->content = $req->content;
            $post->save();
            return redirect()->route('posts.index');
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                return 'Duplicate Entry';
            }
        }*/
        
        
        //validaciones, reglas de validacion, laravel/docs/validation
        $req->validate([
            //'title'=> 'required|min:5|max:255',//validaciones mas simples
            'title'=> ['required','min:5','max:255'],//para validaciones mas complejas, como enums, regex, personalizadas y demas
            'slug'=> 'required|unique:posts',//validacion consultando en la bd que sea unico
            'category'=> 'required',
            'content'=> 'required'                
        ]);
        try {//ejemplo asignacion masiva            
            Post::create($req->all());
            return redirect()->route('posts.index');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
        
    }

    /* compact('p') es mucho mas restrictivo, ya que debe llamarse igual que la variable aqui y en la plantilla blade*/
    /*public function show($p){        
        $p = Post::find($p);
        return view('posts.show',['post'=>$p]);//
    }*/

    //si definimos que el parametro es directamente la consulta funciona, pero post debe ser tambien el nombre de variable
    public function show(Post $post){
        return view('posts.show',['post'=>$post]);
    }//podemos hacer lo mismo en los demas metodos, ¿que pasa si no queremos que use el id?

    public function showCategory($p, $c){
        return "Post N° {$p}, categoría {$c}";
    }

    public function edit($p){
        $p = Post::find($p);
        return view("posts.edit",["post"=>$p]);
    }

    // public function update(Request $req, $post){ // version anterior a validaciones
    public function update(Request $req, Post $post){
        /* //Ejemplo clasico, normal, funciona con parametro $post sin especificar el tipo Post
        $post = Post::find($post);
        $post->title = $req->title;
        $post->slug = $req->slug;
        $post->category = $req->category;
        $post->content = $req->content;
        $post->save();
        return redirect()->route('posts.index', ['post'=>$post]);
        */


        $req->validate([
            //'title'=> 'required|min:5|max:255',//validaciones mas simples
            'title'=> ['required','min:5','max:255'],//para validaciones mas complejas, como enums, regex, personalizadas y demas
            'slug'=> "required|unique:posts,slug,{$post->id}",//excluye d ela verificacion unique el $post->id, tiene sentido en la edicion
            'category'=> 'required',
            'content'=> 'required'                
        ]);        

        try {
            $post->update($req->all());
            return redirect()->route('posts.index', ['post'=>$post]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
        
        //Ejemplo usando asignación masiva
    }

    public function destroy($p){
        $post = Post::find($p);
        $post->delete();
        //return redirect("./posts");
        return redirect()->route('posts.index');
        //return 'eliminando post '.$p;
    }
}
