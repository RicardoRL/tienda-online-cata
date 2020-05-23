<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class EditorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('editors')->insert([
        'nombre' => 'Ricardo',
        'apepat' => 'Rodriguez',
        'apemat' => 'Lopez',
        'fecnac' => '1993-09-20',
        'correo' => 'ricardo@editor.com',
        'password' => Hash::make('ricardo10'),
      ]);

      DB::table('editors')->insert([
        'nombre' => 'Daniel',
        'apepat' => 'Ramirez',
        'apemat' => 'Villalvazo',
        'fecnac' => '1998-10-02',
        'correo' => 'daniel@editor.com',
        'password' => Hash::make('123456789'),
      ]);

      DB::table('editors')->insert([
        'nombre' => 'Juan',
        'apepat' => 'Perez',
        'apemat' => 'Perez',
        'fecnac' => '1990-10-11',
        'correo' => 'editor@editor.com',
        'password' => Hash::make('123456789'),
      ]);
    }
}
