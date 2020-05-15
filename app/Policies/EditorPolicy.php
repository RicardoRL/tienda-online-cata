<?php

namespace App\Policies;

use App\Cliente;
use App\Editor;
use Illuminate\Auth\Access\HandlesAuthorization;

class EditorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Cliente  $user
     * @return mixed
     */

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Cliente  $user
     * @param  \App\Editor  $editor
     * @return mixed
     */
    public function view(Cliente $user, Editor $editor)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Cliente  $user
     * @return mixed
     */
    public function create(Cliente $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Cliente  $user
     * @param  \App\Editor  $editor
     * @return mixed
     */
    public function update(Cliente $user, Editor $editor)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Cliente  $user
     * @param  \App\Editor  $editor
     * @return mixed
     */
    public function delete(Cliente $user, Editor $editor)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Cliente  $user
     * @param  \App\Editor  $editor
     * @return mixed
     */
    public function restore(Cliente $user, Editor $editor)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Cliente  $user
     * @param  \App\Editor  $editor
     * @return mixed
     */
    public function forceDelete(Cliente $user, Editor $editor)
    {
        //
    }
}
