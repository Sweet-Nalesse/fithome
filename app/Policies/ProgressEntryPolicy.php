<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ProgressEntry;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProgressEntryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, ProgressEntry $progressEntry)
    {
        return $user->id === $progressEntry->user_id;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, ProgressEntry $progressEntry)
    {
        return $user->id === $progressEntry->user_id;
    }

    public function delete(User $user, ProgressEntry $progressEntry)
    {
        return $user->id === $progressEntry->user_id;
    }
}
