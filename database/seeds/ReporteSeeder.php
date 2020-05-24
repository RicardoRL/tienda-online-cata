<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ReporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('reportes')->insert([
        'editor_id' => 1,
        'periodo' => 'semanal',
        'fecha_inicio' => '2020-04-01',
      ]);

      DB::table('reportes')->insert([
        'editor_id' => 2,
        'periodo' => 'quincenal',
        'fecha_inicio' => '2020-04-01',
      ]);

      DB::table('reportes')->insert([
        'editor_id' => 1,
        'periodo' => 'mensual',
        'fecha_inicio' => '2020-04-01',
      ]);
    }
}
