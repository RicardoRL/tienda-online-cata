<?php

namespace App\Policies;

use App\Editor;
use Illuminate\Auth\Access\HandlesAuthorization;

class EditorPolicy
{
    use HandlesAuthorization;

    public function isAdmin($editor)
    {
      return $editor->id == 1 || $editor->id == 2;
    }
}
