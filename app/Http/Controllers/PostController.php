<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class PostController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'asc')
                    ->get();

        return view('admin.posts.index', ['posts' => $posts] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validar Formulario

        $data = request()->validate([
            'title'=>'required|max:255',
            'image'=>'required|image',
            'post_content'=>'required'
        ]);

        //recoger la imagen del formulario

        $fileNameWithExtension = request('image')->getClientOriginalName();
        // Nombre de La imagen
        $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
        // Extension de la imagen
        $extension = request('image')->getClientOriginalExtension();

        //Crear nuevo nombre a la imagen
        $newFileName = $fileName . '_' . time(). '.' . $extension;

        //Guardar la imagen en una carpeta publica

        $path = request('image')->storeAs('public/images/post_images', $newFileName); 

        //dd($extension);

        $user = auth()->user();

        $post = new Post();

        $post->titulo = request('title');
        $post->contenido = request('post_content');
        $post->imagen = $newFileName;
        $post->userId = $user->id;

        $post->save();

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $post = Post::find($post->id);

        return view('admin/posts/edit', ['post' => $post]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $data = request()->validate([
            'title'=>'required|max:255',
            'image'=>'required|image',
            'post_content'=>'required'
        ]);

        //recoger la imagen del formulario

        $fileNameWithExtension = request('image')->getClientOriginalName();
        // Nombre de La imagen
        $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
        // Extension de la imagen
        $extension = request('image')->getClientOriginalExtension();

        //Crear nuevo nombre a la imagen
        $newFileName = $fileName . '_' . time(). '.' . $extension;

        //Guardar la imagen en una carpeta publica

        $path = request('image')->storeAs('public/images/post_images', $newFileName); 

        //dd($extension)

        $post = Post::findOrFail($post->id);

        $post->titulo = request('title');
        $post->contenido = request('post_content');
        $post->imagen = $newFileName;
        

        $post->save();

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

     
    public function destroy($id)
    {
        //ELIMINAR        

        $post = Post::findOrFail($id);

        $post -> delete();

        return redirect('/posts');         

        
    }

}
