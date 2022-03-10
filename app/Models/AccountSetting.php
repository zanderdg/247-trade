<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class AccountSetting extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'account_setting';
    protected $guarded  = ['id'];

    // RelationShip
    public function associate_user() 
    {
        return $this->hasOne(User::class);
    }
    
    public function user() {
        return $this->hasOne(User::class, 'id');
    }
}
