<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipomantenimiento extends Model
{
  protected $table = 'tipo_manteniminto';


  protected $primaryKey='id';
   protected $fillable = [
      'nombre_mante'
   ];
}
