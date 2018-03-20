@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-success">
                    <div class="panel-heading"><center>Descargar</center></div>
                    <div class="panel-body">
                        <form action="descargarpro" class="form-horizontal" method="post">
                            @if(count($errors) > 0)
                                <div class="errors">
                                    <ul class="alert-danger">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <input type="text" class="form-control" name="id" readonly="readonly" value="{{ $post->id }}">

                            <div class="form-group">
                                <div class="col-sm-10">
                                  <label for="empresa">Diagnostico y Solucion:</label>
                                  <textarea class="form-control"  placeholder="Diagnostico y solucion" name="solucion" cols="50" rows="10" style="text-transform: uppercase;"  required></textarea>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Descargar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
