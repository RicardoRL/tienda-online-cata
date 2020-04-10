<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cliente extends Authenticatable
{
    use Notifiable;

    protected $guard = 'cliente';

    protected $fillable = [
        'nombre', 'apepat', 'apemat', 'fecnac', 'correo', 'password', 'telefono',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
