<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function view(User $user)
    {
        return $user->can('view-user');
    }

    public function create(User $user)
    {
        return $user->can('create-user');
    }

    public function update(User $user)
    {
        return $user->can('update-user');
    }

    public function delete(User $user)
    {
        return $user->can('delete-user');
    }
}

