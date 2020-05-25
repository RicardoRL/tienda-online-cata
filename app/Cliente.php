<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cliente extends Authenticatable
{
  use Notifiable;
  use softDeletes;

  protected $guard = 'cliente';

  protected $fillable = [
    'nombre', 'apepat', 'apemat', 'fecnac', 'correo', 'password', 'telefono',
  ];

  protected $hidden = [
    'password', 'remember_token',
  ];

  public function pedidos()
  {
    return $this->hasMany('App\Pedido');
  }

  public function domicilio()
  {
    return $this->hasOne('App\Domicilio');
  }

  public function tarjeta()
  {
    return $this->hasOne('App\Tarjeta');
  }

  public function setNombreAttribute($value)
  {
    $this->attributes['nombre'] = ucfirst($value);
  }

  public function setApepatAttribute($value)
  {
    $this->attributes['apepat'] = ucfirst($value);
  }

  public function setApematAttribute($value)
  {
    $this->attributes['apemat'] = ucfirst($value);
  }
}
