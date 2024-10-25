<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function edit(User $user): bool
    {
        //
        $loggedUser = auth()->user();
        return $loggedUser->is($user);
    }
}
