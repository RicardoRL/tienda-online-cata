<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CervezaPedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = \Faker\Factory::create();

      for($i=0; $i<50; $i++)
      {
        DB::table('cerveza_pedido')->insert([
          'cerveza_id' => $faker->numberBetween(1,246),
          'pedido_id' => $faker->numberBetween(1,50),
          'cantidad' => $faker->numberBetween(1,30)
        ]);
      }
    }
}
