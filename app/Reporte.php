<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
  use softDeletes;

  public function reportes()
  {
    return $this->belongsTo('App\Editor');
  }
  
}
