<?php

use Illuminate\Database\Seeder;
use App\Tipomantenimiento;

class TipomanteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Tipomantenimiento::create([
          'nombre_mante' => 'PREVENTIVO'
      ]);

      Tipomantenimiento::create([
          'nombre_mante' => 'CORRECTIVO'
      ]);
    }
}
