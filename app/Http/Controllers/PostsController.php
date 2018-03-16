<?php

namespace App\Http\Controllers;

use App\Post;
use App\Equipo;
use App\Area;
use App\Tipomantenimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;

class PostsController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

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
              ->orderBy('posts.id', 'desc')
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
    public function show2($id)
    {
        $post=Post::findOrFail($id);


        return view('posts/editposts2',compact('post'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'id_usuario'=>'required',
            'nombre_usuario' => 'required',
            'contenido' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->observacion=$request->get('contenido');
        $post->status=$request->get('status');
        $post->update();

        return redirect("posts");
    }

    public function update2($id, Request $request)
    {

        $this->validate($request,[
            'id_usuario'=>'required',
            'nombre_usuario' => 'required',
            'contenido' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->observacion=strtoupper($request->get('contenido'));
        $post->marca=strtoupper($request->get('marca'));
        $post->modelo=strtoupper($request->get('modelo'));
        $post->serie=strtoupper($request->get('serie'));
        $post->update();

        return redirect("vista");
    }

    public function guardarqueja(Request $request)
    {

      $post=new Post;
      $post->id_usuario=$request->get('id_usuario');
      $post->id_area=strtoupper($request->get('area'));
      $post->id_equipo=strtoupper($request->get('tipo_equipo'));
      $post->id_tipomante=strtoupper($request->get('tipo_mante'));
      $post->fecha_reporte=$request->get('fecha');
      $post->telefono=$request->get('telefono');
      $post->email=$request->get('correo');
      $post->nombre_reporta=$request->get('nombre_reporta');
      $post->listado=strtoupper("temporal");
      $post->marca=strtoupper($request->get('marca'));
      $post->modelo=strtoupper($request->get('modelo'));
      $post->serie=strtoupper($request->get('serie'));
      $post->observacion=strtoupper($request->get('observacion'));
      $post->status=strtoupper('pendiente');
      $post->save();

      $phpWord = new \PhpOffice\PhpWord\PhpWord();
      $section = $phpWord->addSection();


      $templateWord = new \PhpOffice\PhpWord\TemplateProcessor('plantillasDoc/plantilla.docx');

      $dia=date('d');
      $mes=date('m');
      $ano=date('Y');
      $fecha=$ano.'-'.$mes.'-'.$dia;

     return redirect("vista");

    }

      public function descargar($id,Request $request){


        $post=Post::leftjoin('area', 'posts.id_area', '=', 'area.id')
        ->leftjoin('equipo', 'posts.id_equipo', '=', 'equipo.id')
        ->leftjoin('tipo_manteniminto', 'posts.id_tipomante', '=', 'tipo_manteniminto.id')
        ->where('posts.id','=',$id)
        ->select('posts.id','posts.telefono','tipo_manteniminto.nombre_mante','posts.nombre_reporta','posts.email','posts.id_usuario','posts.marca','posts.modelo','posts.serie','area.nombre_area','equipo.nombre_equipo','posts.observacion')
        ->get();
        $folio='';
        $telefono='';
        $reporta='';
        $email='';
        $area='';
        $marca='';
        $modelo='';
        $serie='';
        $comentarios='';
        $equipo='';
        $mante='';
        foreach ($post as $po) {
            $folio = $po->id;
            $telefono = $po->telefono;
            $reporta = $po->nombre_reporta;
            $email = $po->email;
            $area = $po->nombre_area;
            $marca = $po->marca;
            $modelo = $po->modelo;
            $serie = $po->serie;
            $comentarios = $po->observacion;
            $equipo = $po->nombre_equipo;
            $mante = $po->nombre_mante;
        }



        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();


        $templateWord = new \PhpOffice\PhpWord\TemplateProcessor('plantillasDoc/plantilla.docx');

        $dia=date('d');
        $mes=date('m');
        $ano=date('Y');
        $fecha=$ano.'-'.$mes.'-'.$dia;

        $templateWord->setValue('folio',$folio);
        $templateWord->setValue('nombre',$reporta);
        $templateWord->setValue('cliente',$area);
        $templateWord->setValue('telefono',$telefono);
        $templateWord->setValue('email',$email);
        $templateWord->setValue('fecha',$fecha);
        $templateWord->setValue('marca',strtoupper($marca));
        $templateWord->setValue('modelo',strtoupper($modelo));
        $templateWord->setValue('serie',strtoupper($serie));
        $templateWord->setValue('mante',strtoupper($mante));
        $templateWord->setValue('equipo',strtoupper($equipo));
        $templateWord->setValue('contenido',strtoupper($comentarios));


        $tim =time();

      $templateWord->saveAs('log/salida'.$tim.'.docx'.$tim);
      //$this->historial('Descarga de oficio de alta del elemento '.$id);
      $nombreDocumento=str_replace("  "," ","Entrega para ".$area." del ".$fecha);
      return Response::download('log/salida'.$tim.'.docx'.$tim,$nombreDocumento.'.docx');
      }

}
