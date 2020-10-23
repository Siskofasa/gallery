<?php


namespace App\Role;

use App\Models\User;


class RoleChecker
{
    public function check(User $user, string $role)
    {
        // Admin has everything
        if ($user->hasRole(UserRole::ROLE_GM)) {
            return true;
        }

        else if($user->hasRole(UserRole::ROLE_OFFICER)) {
            $managementRoles = UserRole::getAllowedRoles(UserRole::ROLE_OFFICER);

            if (in_array($role, $managementRoles)) {
                return true;
            }
        }

        return $user->hasRole($role);
    }
}
