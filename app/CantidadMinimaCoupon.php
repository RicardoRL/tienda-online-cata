<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CantidadMinimaCoupon extends Model
{
  protected $table = 'cantidad_minima_coupons';

  public function descuento($subtotal, $cantidad)
  {
    if($cantidad < $this->cantidad)
    {
      return 0;
    }

    return $subtotal * ($this->porcentaje / 100);
  }
}
