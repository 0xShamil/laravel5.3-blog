<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\User;
use App\Models\Post;

class UserPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->hasRole('Admin')) {
            return true;
        }
    }

    public function update(User $user, $u)
    {
        return $user->id === $u->id;
    }
}
