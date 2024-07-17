<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as SpatieRole;
use Spatie\Permission\Traits\HasRoles;


class Role extends SpatieRole
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string, string>
     */

    protected $fillable = [
        'name',
    ];
    public function permissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'role_has_permissions');
    }
}
