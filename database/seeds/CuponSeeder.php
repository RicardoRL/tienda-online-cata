<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CuponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('coupons')->insert([
        'codigo' => 'ABC123',
        'coupon_type' => 'App\CantidadMinimaCoupon',
        'coupon_id' => 1,
      ]);

      DB::table('coupons')->insert([
        'codigo' => 'ABC456',
        'coupon_type' => 'App\CantidadMinimaCoupon',
        'coupon_id' => 2,
      ]);

      DB::table('coupons')->insert([
        'codigo' => 'ABC789',
        'coupon_type' => 'App\CantidadMinimaCoupon',
        'coupon_id' => 3,
      ]);

      DB::table('coupons')->insert([
        'codigo' => 'DEF123',
        'coupon_type' => 'App\PorcentajeCoupon',
        'coupon_id' => 1,
      ]);

      DB::table('coupons')->insert([
        'codigo' => 'DEF456',
        'coupon_type' => 'App\PorcentajeCoupon',
        'coupon_id' => 2,
      ]);

      DB::table('coupons')->insert([
        'codigo' => 'DEF789',
        'coupon_type' => 'App\PorcentajeCoupon',
        'coupon_id' => 3,
      ]);

      DB::table('coupons')->insert([
        'codigo' => 'GHI123',
        'coupon_type' => 'App\ValorFijoCoupon',
        'coupon_id' => 1,
      ]);
      DB::table('coupons')->insert([
        'codigo' => 'GHI456',
        'coupon_type' => 'App\ValorFijoCoupon',
        'coupon_id' => 1,
      ]);
      DB::table('coupons')->insert([
        'codigo' => 'GHI789',
        'coupon_type' => 'App\ValorFijoCoupon',
        'coupon_id' => 1,
      ]);
    }
}
