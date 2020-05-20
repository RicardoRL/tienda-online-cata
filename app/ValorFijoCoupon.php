<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ValorFijoCoupon extends Model
{
  protected $table = 'valor_fijo_coupons';

  //Regresa la cantidad exacta que se va a descontar del subtotal
  //La variable subtotal no sirve para nada en esta función
  //pero se necesita para no crear otros métodos de descuento
  public function descuento($subtotal)
  {
    return $this->valor;
  }
}
