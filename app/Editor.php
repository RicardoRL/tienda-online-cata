<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Editor extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nombre', 'apepat', 'apemat', 'fecnac', 'correo', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


}
