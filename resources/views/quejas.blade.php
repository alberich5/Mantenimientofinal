@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Auth::check())



       @endif
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading"><center>Mantenimientos</center></div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            @foreach($posts as $post)
                            <tr>
                                <th><h4>{{$post->name}}   @if(Auth::user()->rol == 'admin') <a href="/posts/editposts3/{{$post->id}}" >Download </a>@endif</h4>
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
                                    Marca: {{$post->marca}}
                                    <br>
                                    Modelo: {{$post->modelo}}
                                    <br>
                                    Serie: {{$post->serie}}
                                    <br>
                                    Observaciones: {{$post->observacion}}
                                    <br>
                                    @if($post->cancelar == 'SI')
                                  Cancelado: <span class="label label-danger">{{$post->cancelar}}</span>
                                    @endif
                                    @if($post->cancelar == 'NO')
                                    @endif
                                    <br>
                                      @if($post->status == 'PENDIENTE')
                                    status: <span class="label label-primary">{{$post->status}}</span>
                                      @endif
                                      @if($post->status == 'ATENDIDA')
                                    status: <span class="label label-success">{{$post->status}}</span>
                                      @endif
                                </th>
                                <th>
                                    @if(Auth::check() && Auth::user()->id == $post->id_usuario || Auth::check() && Auth::user()->rol == 'admin')
                                    @if($post->status == 'PENDIENTE')
                                      <a href="/posts/user/{{$post->id}}" ><button class="btn btn-info">Editar</button> </a>
                                      <th>
                                          <a href="/posts/descargar/{{$post->id}}" ><button class="btn btn-success">Bajar</button> </a>
                                          <th>
                                          <a href="/posts/cancelar/{{$post->id}}" ><button class="btn btn-danger">Cancelar</button> </a>
                                          </th>
                                          @if(Auth::user()->rol == 'admin')
                                          <th>
                                            <a href="/posts/editposts/{{$post->id}}" ><button class="btn btn-primary">EditarAdmin</button> </a>
                                            </th>
                                          @endif
                                      </th>

                                    @endif

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
