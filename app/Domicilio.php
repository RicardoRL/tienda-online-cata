<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
  use softDeletes;

  public function cliente()
  {
    return $this->belongsTo('App\Cliente');
  }
}
