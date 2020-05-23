<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PorcentajeCuponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('porcentaje_coupons')->insert([
        'porcentaje' => 15,
      ]);

      DB::table('porcentaje_coupons')->insert([
        'porcentaje' => 30,
      ]);

      DB::table('porcentaje_coupons')->insert([
        'porcentaje' => 55,
      ]);
    }
}
