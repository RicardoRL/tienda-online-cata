<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cerveza extends Model
{
    public function cerveceria()
    {
        return $this->belongsTo('App\Cerveceria');
    }
}
