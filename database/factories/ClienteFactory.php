<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cliente;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {
  return [
    'nombre' => $faker->firstname,
    'apepat' => $faker->lastname,
    'apemat' => $faker->lastname,
    'fecnac' => $faker->date,
    'correo' => $faker->unique()->safeemail,
    'password' => Hash::make('123456789'),
    'telefono' => $faker->e164PhoneNumber,
  ];
});
