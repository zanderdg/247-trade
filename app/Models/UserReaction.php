<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserReaction extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'user_reaction';
    protected $guarded  = array('ud_id');

    public function user() {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
    
}