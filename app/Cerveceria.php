<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cerveceria extends Model
{

    protected $fillable = ['nombre', 'ciudad', 'sitio_web', 'contacto', 'imagen'];

    public function cervezas()
    {
        return $this->hasMany('App\Cerveza');
    }

    
}
