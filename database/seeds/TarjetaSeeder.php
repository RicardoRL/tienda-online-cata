<?php

use App\Tarjeta;
use Illuminate\Database\Seeder;

class TarjetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Tarjeta::class, 12)->create();
    }
}
