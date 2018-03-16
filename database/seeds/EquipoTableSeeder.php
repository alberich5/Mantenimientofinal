<?php

use Illuminate\Database\Seeder;
use App\Equipo;

class EquipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Equipo::create([
          'nombre_equipo' => 'COMPUTADORA DE ESCRITORIO'
      ]);
      Equipo::create([
          'nombre_equipo' => 'ESCANER'
      ]);
    }
}
