<?php

use Illuminate\Database\Seeder;
use App\Area;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Area::create([
          'nombre_area' => 'SISTEMAS'
      ]);
      Area::create([
          'nombre_area' => 'RECLUTAMIENTO'
      ]);
      Area::create([
          'nombre_area' => 'RECURSOS HUMANOS'
      ]);
      Area::create([
          'nombre_area' => 'COBRANZAS'
      ]);
      Area::create([
          'nombre_area' => 'COMERCIALIZACION'
      ]);
    }
}
