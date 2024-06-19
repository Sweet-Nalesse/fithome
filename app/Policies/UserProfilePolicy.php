<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the profile.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserProfile  $profile
     * @return mixed
     */
    public function view(User $user, UserProfile $profile)
    {
        return $user->id === $profile->user_id;
    }

    /**
     * Determine whether the user can update the profile.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserProfile  $profile
     * @return mixed
     */
    public function update(User $user, UserProfile $profile)
    {
        return $user->id === $profile->user_id;
    }
}
