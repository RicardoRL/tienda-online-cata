<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function reporte_pedidos()
    {
        return $this->morphedByMany(Reporte::class, 'polimorfismo');
    }

    public function cerveza_pedidos()
    {
        return $this->morphedByMany(Cerveza::class, 'polimorfismo');
    }
}
