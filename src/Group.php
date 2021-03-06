<?php

namespace Atorscho\Membership;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Group
 *
 * @package Atorscho\Membership
 * @author Alex Torscho <contact@alextorscho.com>
 * @version 2.0.0
 * @property int $id
 * @property string $name
 * @property string $handle
 * @property string $open_tag
 * @property string $close_tag
 * @property int $limit
 * @property bool $public
 * @property-read mixed $formatted_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\Devhouse\Membership\User[] $leaders
 * @property-read \Illuminate\Database\Eloquent\Collection|\Atorscho\Membership\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Devhouse\Membership\User[] $users
 * @method static \Illuminate\Database\Query\Builder|\Atorscho\Membership\Group whereCloseTag($value)
 * @method static \Illuminate\Database\Query\Builder|\Atorscho\Membership\Group whereHandle($value)
 * @method static \Illuminate\Database\Query\Builder|\Atorscho\Membership\Group whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Atorscho\Membership\Group whereLimit($value)
 * @method static \Illuminate\Database\Query\Builder|\Atorscho\Membership\Group whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Atorscho\Membership\Group whereOpenTag($value)
 * @method static \Illuminate\Database\Query\Builder|\Atorscho\Membership\Group wherePublic($value)
 * @mixin \Eloquent
 */
class Group extends Model
{
    use Handlable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'handle', 'open_tag', 'close_tag', 'limit', 'public'];

    /**
     * Cast attributes to relevant types.
     *
     * @var array
     */
    protected $casts = [
        'limit'  => 'int',
        'public' => 'bool'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['formatted_name'];

    /**
     * Disable timestamps population.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get group's users.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(config('auth.providers.users.model'), 'user_groups');
    }

    /**
     * Get group's leaders.
     */
    public function leaders(): BelongsToMany
    {
        return $this->belongsToMany(config('auth.providers.users.model'), 'group_leaders');
    }

    /**
     * Get group's permissions.
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'group_permissions');
    }

    /**
     * Grant given permissions to the group.
     *
     * @param array|Permission|Collection|string $permissions
     */
    public function grantPermissions($permissions): void
    {
        if (!is_array($permissions) && !$permissions instanceof Collection) {
            $permissions = func_get_args();
        }

        foreach ($permissions as $permission) {
            $permission = $this->resolvePermission($permission);

            $permission->assignTo($this);
        }
    }

    /**
     * Lose given permissions from the group.
     *
     * @param array|Permission|Collection $permissions
     */
    public function losePermissions($permissions): void
    {
        if (!is_array($permissions) && !$permissions instanceof Collection) {
            $permissions = func_get_args();
        }

        foreach ($permissions as $permission) {
            $permission = $this->resolvePermission($permission);

            $permission->retractFrom($this);
        }
    }

    /**
     * Assign a user to the group.
     *
     * @param int|Authenticatable $user
     * @param bool                $primary
     *
     * @return bool Whether the user has been assigned.
     */
    public function assign($user, bool $primary = false): bool
    {
        if ($this->limitExceeded()) {
            return false;
        }

        $this->users()->attach($user);

        // Set user's primary group
        if ($primary) {
            // Get user's model name
            $userModel = config('auth.providers.users.model');

            // In case $user is an integer, find the relevant model record
            if (is_int($user)) {
                $user = $userModel::find($user);
            }

            $user->primary_group_id = $this->id;
            $user->save();
        }

        return true;
    }

    /**
     * Retract a user from the group.
     *
     * @param int|Authenticatable $user
     */
    public function retract($user): void
    {
        $this->users()->detach($user);
    }

    /**
     * Determine whether a given user is assigned to the group.
     *
     * @param int|Authenticatable $user
     *
     * @return bool
     */
    public function hasAssigned($user): bool
    {
        return $this->users()->where('user_id', $user->id)->exists();
    }

    /**
     * Add a leader to the group.
     *
     * @param int|Authenticatable $user
     */
    public function addLeader($user): void
    {
        $this->leaders()->attach($user);
    }

    /**
     * Remove a leader from the group.
     *
     * @param int|Authenticatable $user
     */
    public function removeLeader($user): void
    {
        $this->leaders()->detach($user);
    }

    /**
     * Determine whether a given user is leader of the group.
     *
     * @param int|Authenticatable $user
     *
     * @return bool
     */
    public function hasLeader($user): bool
    {
        return $this->leaders()->where('user_id', $user->id)->exists();
    }

    /**
     * Check whether the limit has been exceeded.
     *
     * 0 disables any limit.
     */
    public function limitExceeded(): bool
    {
        return $this->limit !== 0 && $this->users()->count() >= $this->limit;
    }

    /**
     * Get group's formatted name using tags.
     */
    public function getFormattedNameAttribute(): string
    {
        return $this->open_tag . $this->name . $this->close_tag;
    }

    /**
     * Resolve the $permission parameter.
     *
     * @param int|string|Permission $permission
     *
     * @return Permission
     */
    protected function resolvePermission($permission): Permission
    {
        if (is_string($permission)) {
            $permission = Permission::search($permission);
        } elseif (is_int($permission)) {
            $permission = Permission::find($permission);
        }

        return $permission;
    }
}
