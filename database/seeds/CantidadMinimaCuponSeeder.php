<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CantidadMinimaCuponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('cantidad_minima_coupons')->insert([
        'porcentaje' => 10,
        'cantidad' => 6,
      ]);

      DB::table('cantidad_minima_coupons')->insert([
        'porcentaje' => 20,
        'cantidad' => 12,
      ]);

      DB::table('cantidad_minima_coupons')->insert([
        'porcentaje' => 35,
        'cantidad' => 24,
      ]);
    }
}
