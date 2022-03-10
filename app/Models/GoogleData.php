<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GoogleData extends Model
{
    use SoftDeletes;
    
    protected $table = 'google_data';
    protected $guarded  = ['id'];
    protected $dates = ['deleted_at'];

    # Relationship
    public function user() {
        return $this->hasOne(User::class, 'user_id', 'id');
    }
}
