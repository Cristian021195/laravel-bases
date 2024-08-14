<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;//es el namespace del controller
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\PostController;
use App\Models\Post;

//return view('welcome');
Route::get('/', HomeController::class);

/* POSTS */
/*
Route::get('/posts', [PostController::class,'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');//importa el orden de la ruta, de esta manera aseguramos esta ruta en especifico
Route::get('/posts/{post}', [PostController::class,'show'])->name('posts.show');//sino considera como variable
Route::get('/posts/{post}/edit', [PostController::class,'edit'])->name('posts.edit');
Route::get('/posts/{post}/{categoria}', [PostController::class,'showCategory'])->name('posts.categoria');
Route::post('/posts', [PostController::class,'store'])->name('posts.store');
Route::put('/posts/{post}', [PostController::class,'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class,'destroy'])->name('posts.destroy');
*/

//resume todas las rutas de arriba, siempre y cuando se respete la misma estructura de rutas (7 rutas). no entraria posts.categoria

Route::resource('posts', PostController::class);
Route::get('/posts/{post}/{categoria}', [PostController::class,'showCategory'])->name('posts.categoria'); // se agrega la ruta faltante

// las rutas seran con posts.<_.>, y los parametros mantendran el nombre post
//Route::resource('articulos', PostController::class)->names('posts')->parameters(['articulos'=>'post']);

//Route::resource('posts', PostController::class)->except('create','edit'); // anulamos las vistas de form create y edit, sirve para api rest
//Route::apiResource('posts', PostController::class); // lo mismo de arriba

//Route::resource('posts', PostController::class)->except('destroy'); // exceptuamos rutas en su creacion, comprabamos con artisan r:l
//Route::resource('posts', PostController::class)->only(['index','crete','store']); // solo crea las ruas especificadas


/*ABOUT*/
Route::get('/about', function(){return view('about');});

/*CONTACT*/
Route::get('/contact', function(){return view('contact');});

/* IDEAS */
Route::get("/ideas", [IdeaController::class,"index"]);
Route::get('/ideas/{idea}/{segmento?}', [IdeaController::class,'show']);//Parametro opcional


Route::get('pruebas', function(){
    //CREACION DE REGISTRO
    //$post = new Post;
    //$post->title = 'TITULOO de prueba #3';
    //$post->content = 'Contendo de prueba #3';
    //$post->categoria = 'Categoria #3';
    //$post->save();
    //return $post;



    //ACTUALIZACION DE REGISTRO
    //$post = Post::find(1);
    /*$post = Post::where('title','Titulo de prueba #1')->first();
    //$post = Post::whereLike('title','%Titulo de %')->first();
    $post->categoria = 'Desarrollo web';
    $post->save();
    return $post;*/


    //TRAER VARIOS REGISTROS
    //$posts = Post::first();
    //$posts = Post::all();
    //$posts = Post::where('id','>=',2)->get();
    //$posts = Post::orderBy('id', 'desc')->get();
    //$posts = Post::all()->select('id','title','categoria');
    //$posts = Post::select('id','title','categoria')->take(1)->get();
    //return $posts;


    //ELIMINAR REGISTROS
    //$post = Post::find(1);
    //$post->delete();
    //return 'deleted';
});

Route::get('casting', function(){
    $post = Post::find(1);
    //return $post->created_at->format('d-m-Y');
    //return $post->published_at->format('d-m-Y');
    //return var_dump($post->is_active);
    return dd($post->is_active);//funcion de debug en laravel, muestra el tipo de dato    
});
