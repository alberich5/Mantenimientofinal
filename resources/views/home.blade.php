@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img class="img-thumbnail" src="/img/moustache.png" width="80" height="80">
                        <br>
                        <span class="label label-info">Name: {{Auth::user()->name}}</span><br>
                        <span class="label label-info">Email: {{Auth::user()->email}}</span><br>
                        <a href="/users/editprofile/{{Auth::user()->id}}"><button class="btn btn-primary">Editar</button></a>
                    </div>
                </div>
            </div>
        <div class="col-md-8 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Tus Quejas</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        @foreach($posts as $post)
                            <tr>
                                <th>{{$post->nombre_usuario}}
                                    <br>
                                    {{$post->contenido}}
                                </th>
                                <th>
                                    <a href="/posts/editposts/{{$post->id}}" ><button class="btn btn-primary">Editar</button> </a>
                                <th>
                                  <!--  <a href="/posts/delete/{{$post->id}}" ><button class="btn btn-danger">Delete</button> </a>-->
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
