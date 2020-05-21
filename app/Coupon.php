<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
  use softDeletes;

  public static function findByCode($codigo)
  {
    return self::where('codigo', $codigo)->first();
  }

  public function coupon()
  {
    return $this->morphTo();
  }

  public function descuento($subtotal)
  {
    return $this->coupon->descuento($subtotal);
  }

  public function desc_por_cant($subtotal, $cantidad)
  {
    return $this->coupon->descuento($subtotal, $cantidad);
  }
}
