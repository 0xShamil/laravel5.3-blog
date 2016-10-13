<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\User;
use App\Models\Categories;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->hasRole('Admin')) {
            return true;
        }
    }

    public function create(User $user)
    {
        if($user->hasRole('Editor')) {
            return true;
        }
    }

    public function update(User $user)
    {
        if($user->hasRole('Editor')) {
            return true;
        }
    }
}
