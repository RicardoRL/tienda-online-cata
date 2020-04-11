<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cliente;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {
    return [
        //
        'nombre' => $faker->name,
        'apepat' => $faker->lastname,
        'apemat' => $faker->lastname,
        'fecnac' => $faker->date,
        //'email_verified_at' => now(),
        'correo' => $faker->unique()->safeemail,
        'password' => '$O0rOQ5byMi.Ye4oKoElC/.og/at2.uheG/igi', // Contrasena
        'telefono' => $faker->phoneNumber,
        'remember_token' => Str::random(10),


    ];
});
