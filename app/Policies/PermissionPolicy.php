<?php

namespace App\Policies;

use App\Models\User;

class PermissionPolicy
{
    public function view(User $user)
    {
        return $user->can('view-permission');
    }

    public function create(User $user)
    {
        return $user->can('create-permission');
    }

    public function update(User $user)
    {
        return $user->can('update-permission');
    }

    public function delete(User $user)
    {
        return $user->can('delete-permission');
    }
}

