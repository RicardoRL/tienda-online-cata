<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
  public function cliente()
  {
    return $this->belongsTo('App\Cliente');
  }

  public function cervezas()
  {
    return $this->belongsToMany('App\Cerveza')->withTimestamps()->withPivot('cantidad');
  }
}
