<?php

namespace App\Policies;

use App\Models\User;

class AdminPolicy
{
    /**
     * Create a new policy instance.
     */
    public function accessAdmin($user){
        return $user->role === 'admin';
    }
}
