@extends('layouts.app')

@section('content')
    <div class="container" id="app">
        @if (Auth::check())
          <form action="guardarqueja" class="form-horizontal" method="get">
                @if(count($errors) > 0)
                    <div class="errors">
                        <ul class="alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" name="id_usuario" value="{{ Auth::user()->id }}" >
                        <input type="hidden" class="form-control" name="nombre_usuario" value="{{ Auth::user()->name }}" >
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                      <label for="fecha">Fecha del reporte:</label>
                        <input type="date" class="form-control" name="fecha"  value="<?php echo date("Y-m-d");?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                      <label for="nombre_reporta">Nombre Completo de quien Reporta:</label>
                        <input type="text" class="form-control" name="nombre_reporta" placeholder="Escriba su nombre" value="{{old('nombre_reporta')}}" style="text-transform: uppercase;" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                      <label for="telefono">Telefono:</label>
                        <input type="text" class="form-control" name="telefono" placeholder="Su telefono" value="{{old('telefono')}}" v-model="telefono" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                      <label for="correo">Correo Electronico:</label>
                        <input type="email" class="form-control" name="correo" placeholder="Su Correo Elecrtomnico" value="{{old('correo')}}" v-model="email" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                      <label for="area">Area - Departamento - Delegacion:</label>
                      <select name="area" id="" class="form-control">
            		    		@foreach($area as $areas)
            			            <option value='{{{$areas->id}}}'>{{{$areas->nombre_area}}}</option>
            			        @endforeach
            		        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                      <label for="tipo">Tipo de Compúto:</label>
                      <select name="tipo_equipo" id="" class="form-control">
                        @foreach($equipo as $equipos)
                              <option value='{{{$equipos->id}}}'>{{{$equipos->nombre_equipo}}}</option>
                          @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                      <label for="telefono">Marca:</label>
                        <input type="text" class="form-control" name="marca" placeholder="Marca" value="{{old('marca')}}" v-model="marca" style="text-transform: uppercase;">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                      <label for="telefono">Modelo:</label>
                        <input type="text" class="form-control" name="modelo" placeholder="Modelo" value="{{old('modelo')}}" v-model="modelo" style="text-transform: uppercase;">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                      <label for="telefono">Serie:</label>
                        <input type="text" class="form-control" name="serie" placeholder="Serie" value="{{old('serie')}}" v-model="serie" style="text-transform: uppercase;">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                      <label for="entrada">Tipo de Manteniento:</label>
                      <select name="tipo_mante" id="" class="form-control">
                        @foreach($manti as $mantis)
                              <option value='{{{$mantis->id}}}'>{{{$mantis->nombre_mante}}}</option>
                          @endforeach
                        </select>
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-sm-10">
                      <label for="empresa">Observaciones del Equipo:</label>
                      <textarea class="form-control"  placeholder="Ejemplo. Especifique Algun detalle que haya notado en el equipo" name="observacion" cols="50" rows="10" style="text-transform: uppercase;"  required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary" value="Guardar" v-on:click="mostrarAlert()">
                    </div>
                </div>
            </form>

       @endif
        <div class="row">
          <div class="col-xs-12">
            <pre>@{{$data}}</pre>
          </div>
        </div>
    </div>
@endsection

@section('js')

  <script type="text/javascript">
  var vm = new Vue({
          //id asignado al div en el que funcionara vue
          el: '#app',
          //funcion al crear el objet
          data:{
              areas:[],
              tipo_compu:[],
              mantenimiento:[],
              id_usuario:'',
              fecha:'',
              quien_reporta:'',
              telefono:'',
              email:'',
              area:'',
              marca:'',
              modelo:'',
              serie:'',
              tipo_computo:'',
              tipo_mantenimiento:'',
              observaciones:'',
              respuesta:'',
              searchUsuario:{'username':'','nombre':'','paterno':'','materno':''},
                  },
          methods:{
              mostrarAlert:function(){

                  var urlStatus = '/guardarqueja?fecha=' + this.fecha+'&nombre='+this.quien_reporta+'&telefono='+this.telefono+'&email='+this.email+'&area='+this.area+'&marca='+this.marca+'&modelo='+this.modelo+'&serie='+this.serie+'&tipocompu='+this.tipo_computo+'&tipomante='+this.tipo_mantenimiento+'&observa='+this.observaciones;
                    axios.get(urlStatus).then(response => {
                    this.respuesta = response.data
                  });

              },
              mostrarCancelar:function(){
                  toastr.success('Eliminado');
              },
      }});
  </script>
@endsection
