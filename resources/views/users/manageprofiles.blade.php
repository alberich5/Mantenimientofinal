@extends('layouts.app')

@section('content')

    <div class="container">
        @if(count($errors) > 0)
            <div class="errors">
                <ul class="alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

@if(Auth::user()->rol == 'admin')

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading"><center>Administrador de Usuarios</center></div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>Usuario</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                                <tr>
                                @foreach($users as $user)
                                    <th>{{$user->id}}</th>
                                    <th>{{$user->name}}</th>
                                    <th>{{$user->username}}</th>
                                    <th>{{$user->email}}</th>
                                    <th>{{$user->rol}}</th>
                                    <th><a href="/users/editprofile/{{$user->id}}">
                                            <button class="btn btn-primary">Editar</button>
                                        </a>
                                        <a href="/users/delete/{{$user->id}}">
                                            <button class="btn btn-danger">Elimnar</button>
                                        </a></th>
                            </tr>
                            @endforeach
                            </thead>
                        </table>
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-success">
                    <div class="panel-heading"><center>Crear usuario</center></div>
                    <div class="panel-body">
                      <form action="guardaruser" class="form-horizontal" method="get">
                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          <label for="name" class="col-md-4 control-label">Nombre</label>
                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                              @if ($errors->has('name'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      <div class="form-group{{ $errors->has('usuario') ? ' has-error' : '' }}">
                          <label for="usuario" class="col-md-4 control-label">Usuario</label>
                          <div class="col-md-6">
                              <input id="usuario" type="text" class="form-control" name="usuario" value="{{ old('usuario') }}" required>
                              @if ($errors->has('usuario'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('usuario') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-12">
                            <label>Rol:</label>
                            <select class="form-control" name="rol" id="rol">
                                <option>User</option>
                                <option>Admin</option>
                            </select>
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                          <label for="password" class="col-md-4 control-label">Password</label>

                          <div class="col-md-6">
                              <input id="password" type="password" class="form-control" name="password" required>

                              @if ($errors->has('password'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      <input type="submit" class="btn btn-primary" value="Guardar" >
                  </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
