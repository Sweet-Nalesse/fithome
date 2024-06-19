<?php

namespace App\Policies;

use App\Models\Message;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
{
    use HandlesAuthorization;

    public function update(User $user, Message $message)
    {
        return $user->id === $message->user_id;
    }

    public function delete(User $user, Message $message)
    {
        return $user->id === $message->user_id;
    }
}

