<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cerveceria extends Model
{

  use softDeletes;

  protected $fillable = ['nombre', 'ciudad', 'sitio_web', 'contacto', 'imagen'];

  public function cervezas()
  {
    return $this->hasMany('App\Cerveza');
  }

  public function setCiudadAttribute($value)
  {
    $this->attribute['ciudad'] = ucfirst($value);
  }
}
