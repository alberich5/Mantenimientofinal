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
      Area::create([
          'nombre_area' => 'AUDITORIA'
      ]);
      Area::create([
          'nombre_area' => 'DEPARTAMENTO DE ASUNTOS JURICOS'
      ]);
      Area::create([
          'nombre_area' => 'COORDINACIÓN OPERATIVA'
      ]);
      Area::create([
          'nombre_area' => 'HUAJUAPAN DE LEON OAXACA (I DELEGACIÓN)'
      ]);
      Area::create([
          'nombre_area' => 'SAN JUAN BAUTISTA TUXTEPEC OAXACA ( II DELEGACIÓN)'
      ]);
      Area::create([
          'nombre_area' => 'MATIAS ROMERO ( III DELEGACIÓN)'
      ]);
      Area::create([
          'nombre_area' => 'DELEGACION REGIONAL DE VALLES CENTRALES'
      ]);
      Area::create([
          'nombre_area' => 'JUCHITAN DE ZARAGOZA ( IV DELEGACIÓN)'
      ]);
      Area::create([
          'nombre_area' => 'SALINA CRUZ OAXACA'
      ]);
      Area::create([
          'nombre_area' => 'REGIONAL LA VENTA'
      ]);
      Area::create([
          'nombre_area' => 'PUERTO ESCONDIDO OAXACA ( V DELEGACIÓN)'
      ]);
      Area::create([
          'nombre_area' => 'HUATULCO'
      ]);
      Area::create([
          'nombre_area' => 'PINOTEPA NACIONAL'
      ]);
      Area::create([
          'nombre_area' => 'COMANDANCIA DE SERVICIOS'
      ]);
      Area::create([
          'nombre_area' => 'CUARTEL'
      ]);
      Area::create([
          'nombre_area' => 'DEPARTAMENTO DE COBRANZAS'
      ]);
      Area::create([
          'nombre_area' => 'DEPARTAMENTO DE SERVICIOS GENERALES Y RECURSOS MATERIALES'
      ]);
      Area::create([
          'nombre_area' => 'DEPARTAMENTO DE RECURSOS HUMANOS Y SELECCIÓN DE PERSONAL'
      ]);
      Area::create([
          'nombre_area' => 'UNIDAD DE COMERCIALIZACION Y SERVICIO A CLIENTES'
      ]);
      Area::create([
          'nombre_area' => 'DEPARTAMENTO DE ARMAMENTOS'
      ]);
    }
}
