<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Evento extends Model
{
  use softDeletes;
  
  protected $fillable = ['editor_id', 'nombre', 'sede','fecha','asistentes','imagen'];
}
