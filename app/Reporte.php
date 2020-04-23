<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    public function reporte_cerveza()
    {
        return $this->morphToMany(Pedido::class, 'polimorfismo');
    }
}
