<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PorcentajeCoupon extends Model
{
  protected $table = 'porcentaje_coupons';

  public function descuento($subtotal)
  {
    return $subtotal * ($this->porcentaje / 100);
  }
}
