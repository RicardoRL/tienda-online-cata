<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PorcentajeCoupon extends Model
{
  use softDeletes;
  protected $table = 'porcentaje_coupons';

  public function descuento($subtotal)
  {
    return $subtotal * ($this->porcentaje / 100);
  }
}
