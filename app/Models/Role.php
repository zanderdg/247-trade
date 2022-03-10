<?php 

namespace App\Models;

use App\Models\User;
use App\Models\RoleUser;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The database table used by model.
     *
     * @var string
    */

    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'save'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function roleUser()
    {
        return $this->belongsToMany(RoleUser::class);
    }
    
}
