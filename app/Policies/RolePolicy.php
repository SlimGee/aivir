<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Role;
use App\Models\User;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  Role  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view all roles');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Role  $role
     * @return bool
     */
    public function view(User $user, Role $role): bool
    {
        return $user->can('view role', $role);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create role');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Role  $role
     * @return bool
     */
    public function update(User $user, Role $role): bool
    {
        return $user->can('update role', $role);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Role  $role
     * @return bool
     */
    public function delete(User $user, Role $role): bool
    {
        return $user->can('delete role', $role);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  Role  $role
     * @return bool
     */
    public function restore(User $user, Role $role): bool
    {
        return $user->can('restore role', $role);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  Role  $role
     * @return bool
     */
    public function forceDelete(User $user, Role $role): bool
    {
        return $user->can('force delete role', $role);
    }
}
