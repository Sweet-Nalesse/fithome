<?php
namespace App\Policies;

use App\Models\Forum;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ForumPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Forum $forum)
    {
        return $user->is_admin || $user->id === $forum->user_id;
    }

    public function delete(User $user, Forum $forum)
    {
        return $user->is_admin || $user->id === $forum->user_id;
    }
}