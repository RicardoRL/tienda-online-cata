<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cerveceria extends Model
{
    public function cervezas()
    {
        return $this->hasMany('App\Cerveza');
    }
}
