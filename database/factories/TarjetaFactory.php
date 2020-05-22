<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tarjeta;
use Faker\Generator as Faker;

$factory->define(Tarjeta::class, function (Faker $faker) {
    return [
      'cliente_id' => $faker->unique(true)->numberBetween(1,12),
      'tipo' => $faker->randomElement($array = array ('credito','debito')),
      'num_tarjeta' => $faker->creditCardNumber,
      'banco' => $faker->randomElement($array = array ('banorte','bancomer','banamex')),
      'nombre' => $faker->firstname,
      'apellido' => $faker->lastname,
      'fecha_exp' => $faker->creditCardExpirationDateString,
      'codigo' => $faker->randomNumber(3)
    ];
});
