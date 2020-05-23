<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ValorFijoCuponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('valor_fijo_coupons')->insert([
        'valor' => 100,
      ]);

      DB::table('valor_fijo_coupons')->insert([
        'valor' => 150,
      ]);

      DB::table('valor_fijo_coupons')->insert([
        'valor' => 300,
      ]);
    }
}
