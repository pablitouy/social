<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Storage;
use Session;
use Redirect;
//use Uuid;
use Auth;
use Str;
use Illuminate\Support\Facades\Crypt;
//use FileVault;
//use Zip;
//use Madzipper;

use App\Post;
//use App\Comentario;


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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::orderby('id', 'DESC')->get();
        return view('home', ['posts' => $posts]);
    }


    public function publicar(Request $request)
    {
        $post = new Post;
        $post->detalle = $request->detalle;
        $post->user_id = Auth::user()->id;
        $post->save();
        Session::flash('message', 'Publicacion realziada con exito');
        return Redirect::to('/home');
        //return view('gastos/edit', ['gasto' => $gasto]);
    }   
/*
    public function publicarcomentario(Request $request)
    {
        $uuid = Uuid::generate()->string;
        if ($request->myFiles)
        {
            $name = $request->myFiles->getClientOriginalName();
            $ext=explode('.',$name)[1];
            $name = $uuid.'.'.$ext;
            $f = \Storage::disk('docs')->put($name, \File::get($request->myFiles));
            $post = new Comentario;
            $post->archivo = $name;
            $post->comentario = $request->detalle;
            $post->user_id = Auth::user()->id;
            $post->post_id = $request->post_id;
            $post->comentario_id = 0;
            $post->save();
        }
        else
        {
            $post = new Comentario;
            $post->archivo = "";
            $post->comentario = $request->detalle;
            $post->user_id = Auth::user()->id;
            $post->post_id = $request->post_id;
            $post->comentario_id = 0;
            $post->save();  
        }
        
        Session::flash('message', 'Comentario realziada con exito');
        return Redirect::to('proyecto/post/'.$request->post_id);
        //return view('gastos/edit', ['gasto' => $gasto]);
    }

    public function descargar($id)
    {
        //dd($request->id);
        $doc = Post::where('id', '=', $id)->first(); 
        if($doc)
        {
            if($doc->archivo != '')
            {
                $doc->descargado = $doc->descargado + 1;
                //$doc->visto = $doc->visto + 1;
                $doc->save();
                return response()->download(public_path('files/docs/'.$doc->archivo));
            }
            else
            {
                Session::flash('error', 'El Post no contiene archivos');
                return Redirect::to('proyecto');
             }
        }
        else
        {
            Session::flash('error', 'El Post no existe');
            return Redirect::to('proyecto');
        }
    }     

    public function descargarcomentario($id)
    {
        //dd($request->id);
        $doc = Comentario::where('id', '=', $id)->first(); 
        if($doc)
        {
            if($doc->archivo != '')
            {
                $doc->descargado = $doc->descargado + 1;
                //$doc->visto = $doc->visto + 1;
                $doc->save();
                return response()->download(public_path('files/docs/'.$doc->archivo));
            }
            else
            {
                Session::flash('error', 'El Comentario no contiene archivos');
                return Redirect::to('proyecto');
             }
        }
        else
        {
            Session::flash('error', 'El PoComentario no existe');
            return Redirect::to('proyecto');
        }
    }

    public function leerpost($id)
    {
        //dd($request->id);
        $post = Post::where('id', '=', $id)->with('comentarios')->orderby('id', 'DESC')->first(); 
        $comentarios = Comentario::where('post_id', '=', $id)->orderby('id', 'DESC')->get(); 
        if($post)
        {
            $post->visto = $post->visto + 1;
            //$doc->visto = $doc->visto + 1;
            $post->save();
            return view('winav/leer-post', ['post' => $post, 'comentarios' => $comentarios]);
            //return response()->download(public_path('files/docs/'.$doc->archivo));
        }
        else
        {
            Session::flash('error', 'El Post no existe');
            return Redirect::to('proyecto');
        }
    }  
    
    public function borrar($id)
    {
        //dd($request->id);
        $post = Post::where('id', '=', $id)->first(); 
        if($post)
        {
            $post->delete();
            Session::flash('message', 'El Post fue borrado con exito');
            return Redirect::to('proyecto');
            //return response()->download(public_path('files/docs/'.$doc->archivo));
        }
        else
        {
            Session::flash('error', 'El Post no existe');
            return Redirect::to('proyecto');
        }
    }      
*/
}
