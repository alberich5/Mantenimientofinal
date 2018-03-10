<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
  protected $table = 'posts';


  protected $primaryKey='id';
   protected $fillable = [
      'id_usuario',
      'id_area',
      'id_equipo',
      'id_tipomante',
      'fecha_reporte',
      'telefono',
      'email',
      'listado',
      'marca',
      'modelo',
      'serie',
      'observacion',
      'status'
   ];
}
