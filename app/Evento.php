<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Evento extends Model
{
    protected $fillable = ['nombre', 'sede','fecha','asistentes','imagen'];
}
