<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;

use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->hasRole('Admin')) {
            return true;
        }
    }

    public function owns(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    public function update(User $user, Post $post)
    {
        if($user->id === $post->user_id || $user->hasRole('Editor')) {
            return true;
        }
    }

    public function create(User $user)
    {
        if($user->hasRole('Author') || $user->hasRole('Editor')) {
            return true;
        }
    }
}
