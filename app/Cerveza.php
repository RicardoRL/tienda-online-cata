<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Cerveza extends Model
{
    public function cerveceria()
    {
        return $this->belongsTo('App\Cerveceria');
    }
}
