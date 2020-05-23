<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('eventos')->insert([
        'editor_id' => '1',
        'nombre' => 'Festival Cata 2018',
        'sede' => 'San Luis Potosí',
        'fecha' => '2018-07-15',
        'asistentes' => 700,
      ]);

      DB::table('eventos')->insert([
        'editor_id' => '1',
        'nombre' => 'Cata Cerveza Artesanal 2018',
        'sede' => 'San Luis Potosí',
        'fecha' => '2018-10-25',
        'asistentes' => 15,
      ]);

      DB::table('eventos')->insert([
        'editor_id' => '1',
        'nombre' => 'Festival Cata 2019',
        'sede' => 'Guadalajara',
        'fecha' => '2019-07-21',
        'asistentes' => 800,
      ]);

      DB::table('eventos')->insert([
        'editor_id' => '2',
        'nombre' => 'Festival Las Mejores Chelas',
        'sede' => 'Guadalajara',
        'fecha' => '2019-11-08',
        'asistentes' => 940,
      ]);

      DB::table('eventos')->insert([
        'editor_id' => '2',
        'nombre' => 'Cata Cerveza Artesanal 2019',
        'sede' => 'San Luis Potosí',
        'fecha' => '2019-11-25',
        'asistentes' => 15,
      ]);

      DB::table('eventos')->insert([
        'editor_id' => '2',
        'nombre' => 'Festival Cata 2019',
        'sede' => 'Zacatecas',
        'fecha' => '2020-02-05',
        'asistentes' => 1125,
      ]);
    }
}
