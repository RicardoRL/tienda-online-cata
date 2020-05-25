<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
  use softDeletes;
  public function cliente()
  {
    return $this->belongsTo('App\Cliente');
  }

  public function cervezas()
  {
    return $this->belongsToMany('App\Cerveza')->withTimestamps()->withPivot(['cantidad', 'deleted_at']);
  }

  /*public function cervezasWithTrashed()
  {
    return $this->belongsToMany('App\Cerveza')->withTimeStamps()->withPivot(['cantidad', 'deleted_at']);
  }*/
}
