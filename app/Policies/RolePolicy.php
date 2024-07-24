<?php

namespace App\Policies;


use App\Models\User;

class RolePolicy
{
    public function view(User $user)
    {

        return $user->can('view-role');
    }

    public function create(User $user)
    {
        return $user->can('create-role');
    }

    public function update(User $user)
    {
        return $user->can('update-role');
    }

    public function delete(User $user)
    {
        return $user->can('delete-role');
    }
}

