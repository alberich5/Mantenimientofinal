<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
  protected $table = 'area';


  protected $primaryKey='id';
   protected $fillable = [
      'nombre_area'
   ];
}
