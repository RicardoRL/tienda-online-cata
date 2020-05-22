<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Domicilio;
use Faker\Generator as Faker;

$factory->define(Domicilio::class, function (Faker $faker) {
    return [
      'cliente_id' => $faker->unique()->numberBetween(1,12),
      'codigo_postal' => $faker->postcode,
      'estado' => $faker->state,
      'ciudad' => $faker->city,
      'colonia' => $faker->cityPrefix,
      'calle_principal' => $faker->streetName,
      'num_ext' => $faker->buildingNumber,
      'num_int' => $faker->numberBetween(1,50),
      'calle1' => $faker->streetName,
      'calle2' => $faker->streetName
    ];
});
