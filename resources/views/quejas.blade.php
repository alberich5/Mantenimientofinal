@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Auth::check())



       @endif
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><center>Mantenimientos</center></div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            @foreach($posts as $post)
                            <tr>
                                <th><h4>{{$post->name}}</h4>
                                    <br>
                                <strong>Folio: </strong> {{$post->id}}
                                    <br>
                                    FECHA RECIBIO: {{$post->fecha_reporte}}
                                    <br>
                                    Delegacion o Area: {{$post->nombre_area}}
                                    <br>
                                    Tipo de mantenimimiento: {{$post->nombre_mante}}
                                    <br>
                                    Equipo: {{$post->nombre_equipo}}
                                    <br>
                                    Observaciones: {{$post->observacion}}
                                    <br>
                                      @if($post->status == 'pendiente')
                                    status: <span class="label label-primary">{{$post->status}}</span>
                                      @endif
                                      @if($post->status == 'atendido')
                                    status: <span class="label label-success">{{$post->status}}</span>
                                      @endif
                                </th>
                                <th>
                                    @if(Auth::check() && Auth::user()->id == $post->id_usuario || Auth::check() && Auth::user()->rol == 'admin')
                                <a href="/posts/editposts/{{$post->id}}" ><button class="btn btn-info">Editar</button> </a>
                                </th>
                                <th>
                                    <!--<a href="/posts/delete/{{$post->id}}" ><button class="btn btn-danger">Delete</button> </a>-->
                                    @endif
                                </th>
                            </tr>
                                @endforeach
                            </thead>
                        </table>
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
