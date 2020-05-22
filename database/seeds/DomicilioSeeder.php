<?php

use App\Domicilio;
use Illuminate\Database\Seeder;

class DomicilioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Domicilio::class, 12)->create();
    }
}
