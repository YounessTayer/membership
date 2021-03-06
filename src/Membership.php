<?php

namespace Atorscho\Membership;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

/**
 * Class Membership
 * Varios helper methods and shorthands.
 *
 * @package Atorscho\Membership
 * @author  Alex Torscho <contact@alextorscho.com>
 * @version 2.0.0
 */
class Membership
{
    /**
     * Determine if the current user is authenticated.
     */
    public function isLoggedIn(): bool
    {
        return auth()->check();
    }

    /**
     * Determine if the current user is a guest.
     */
    public function isGuest(): bool
    {
        return !$this->isLoggedIn();
    }

    /**
     * Retrieve currently authenticated user or its attribute value.
     *
     * @param string|null $attribute Optional.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|string|null
     */
    public function user(?string $attribute = null)
    {
        if ($this->isGuest()) {
            return null;
        }

        $user = auth()->user();

        if ($attribute) {
            return $user->{$attribute};
        }

        return $user;
    }

    /**
     * Register Gate policies in order to integrate
     * Membership into Laravel Authorization system.
     */
    public function registerGatePolicies(): void
    {
        if (!\Schema::hasTable('permissions')) {
            return;
        }

        $permissions = Permission::all(['handle', 'type']);

        foreach ($permissions as $permission) {
            Gate::define($permission->code, function (Authenticatable $user, ?Model $model = null, string $userForeignKey = 'user_id') use ($permission) {
                return $user->hasPermission($permission->code, $model, $userForeignKey);
            });
        }
    }
}
