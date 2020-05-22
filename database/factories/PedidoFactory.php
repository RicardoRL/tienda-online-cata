<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pedido;
use Faker\Generator as Faker;

$factory->define(Pedido::class, function (Faker $faker) {
    return [
      'cliente_id' => $faker->unique(true)->numberBetween(1,12),
      'fecha' => $faker->date,
      'estado' => randomElement($array = array ('pedido hecho','recibido','cancelado', 'enviado')),
      'metodo_envio' => randomElement($array = array('normal', 'expres')),
      'metodo_pago' => randomElement($array = array('tarjeta', 'paypal')),
    ];
});
