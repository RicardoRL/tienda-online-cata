<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Cerveza extends Model
{
  use softDeletes;

  protected $fillable = ['cerveceria_id', 'nombre', 'estilo', 'aspecto', 'sabor_aroma',
  'alcohol', 'temp_consumo', 'maridaje', 'presentacion',
  'precio', 'cantidad', 'imagen'];

  public function cerveceria()
  {
    return $this->belongsTo('App\Cerveceria');
  }

  public function pedidos()
  {
    return $this->belongsToMany('App\Pedido')->withTimestamps()->withPivot(['cantidad', 'deleted_at']);
  }

  /*public function pedidosWithTrashed()
  {
    return $this->belongsToMany('App\Pedido')->withTimeStamps()->withPivot(['cantidad', 'deleted_at']);
  }*/

  public function setNombreAttribute($value)
  {
    $this->attributes['nombre'] = strtolower($value);
  }
}
