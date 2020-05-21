<?php

namespace App\Policies;

use App\Editor;
use Illuminate\Auth\Access\HandlesAuthorization;

class EditorPolicy
{
    use HandlesAuthorization;

    public function isAdmin(Editor $editor)
    {
      return $editor->id == 1;
    }
}
