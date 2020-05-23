<?php

namespace App\Policies;

use App\Cliente;
use App\Editor;
use App\Evento;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function owner($editor, $evento)
    {
        return $editor->id == $evento->editor_id;
    }
}
