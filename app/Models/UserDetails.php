<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDetails extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    // protected $sluggable = [
    //     'build_from' => 'name',
    //     'save_to'    => 'slug',
    //     'on_update'  => true,
    // ];

    protected $table = 'user_details';

    protected $guarded  = array('ud_id');
    
    public $primaryKey = 'ud_id';

    public function user()
    {
        return $this->hasOne(User::class);
    }
    
}
