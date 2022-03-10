<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * The database table used by model.
     *
     * @var string
    */

    protected $table = 'permissions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'save'];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
