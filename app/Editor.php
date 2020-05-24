<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Editor extends Authenticatable
{
    use Notifiable;
    use softDeletes;

    protected $fillable = [
        'nombre', 'apepat', 'apemat', 'fecnac', 'correo', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function reportes()
    {
      return $this->hasMany('App\Reporte');
    }

}
