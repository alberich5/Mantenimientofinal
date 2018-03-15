<?php

namespace App\Http\Controllers;

use App\Post;
use App\Equipo;
use App\Area;
use App\Tipomantenimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    public function index()
    {

          $equipo = Equipo::orderBy('created_at', 'desc')->get();
          $area = Area::orderBy('created_at', 'desc')->get();
          $manti = Tipomantenimiento::orderBy('created_at', 'desc')->get();


        return view("posts",["equipo"=>$equipo,"area"=>$area,"manti"=>$manti]);
    }

    public function queja()
    {

        $posts = Post::leftjoin('users', 'posts.id_usuario', '=', 'users.id')
              //->leftjoin('equipo ', 'posts.id_equipo', '=', 'equipo.id')
              ->leftjoin('area', 'posts.id_area', '=', 'area.id')
              ->leftjoin('equipo', 'posts.id_equipo', '=', 'equipo.id')
              ->leftjoin('tipo_manteniminto', 'posts.id_tipomante', '=', 'tipo_manteniminto.id')
              ->select('posts.id','posts.id_usuario','users.name','area.nombre_area','tipo_manteniminto.nombre_mante','nombre_equipo','posts.observacion','posts.fecha_reporte','posts.status')
               ->paginate(10);

        return view('quejas',compact("posts"));
    }
    public function vistas()
    {

        $posts = Post::leftjoin('users', 'posts.id_usuario', '=', 'users.id')
              //->leftjoin('equipo ', 'posts.id_equipo', '=', 'equipo.id')
              ->leftjoin('area', 'posts.id_area', '=', 'area.id')
              ->leftjoin('equipo', 'posts.id_equipo', '=', 'equipo.id')
              ->leftjoin('tipo_manteniminto', 'posts.id_tipomante', '=', 'tipo_manteniminto.id')
              ->select('posts.id','posts.id_usuario','users.name','area.nombre_area','tipo_manteniminto.nombre_mante','nombre_equipo','posts.observacion','posts.fecha_reporte','posts.status')
              ->where('posts.id_usuario','=',Auth::id())
               ->paginate(10);
      

        return view('quejas',compact("posts"));
    }

    public function store(Request $request)
    {
        $this->validate($request,[


        ]);
        //dd($request->all());
        Post::create($request->all());

        return redirect('posts');
    }

    public function destroy($id)
    {
        Post::destroy($id);

        return redirect('posts');
    }

    public function show($id)
    {
        $post=Post::findOrFail($id);

        return view('posts/editposts',compact('post'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'id_usuario'=>'required',
            'nombre_usuario' => 'required',
            'contenido' => 'required',
        ]);
        $post = Post::findOrFail($id);
        $input = $request->all();
        $post->fill($input)->save();

        return redirect("posts");
    }

    public function guardarqueja(Request $request)
    {

      $post=new Post;
      $post->id_usuario=$request->get('id_usuario');
      $post->id_area=$request->get('area');
      $post->id_equipo=$request->get('tipo_equipo');
      $post->id_tipomante=$request->get('tipo_mante');
      $post->fecha_reporte=$request->get('fecha');
      $post->telefono=$request->get('telefono');
      $post->email=$request->get('correo');
      $post->listado="temporal";
      $post->marca=$request->get('marca');
      $post->modelo=$request->get('modelo');
      $post->serie=$request->get('serie');
      $post->observacion=$request->get('observacion');
      $post->status='pendiente';
      $post->save();
      return redirect("posts");
    }

}
