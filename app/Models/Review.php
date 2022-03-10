<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'reviews';
    protected $guarded  = array('id');

    public function user() {
        $this->hasOne(User::class, 'tradeperson_id');
    }
}
