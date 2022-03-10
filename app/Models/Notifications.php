<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Notifications extends Model {

    //use SoftDeletes;
    

    //protected $dates = ['deleted_at'];

    // protected $sluggable = [
    //     'build_from' => 'name',
    //     'save_to'    => 'slug',
    //     'on_update'  => true,
    // ];

    protected $table = 'notifications';

    protected $guarded  = array('n_id');
    
    public $primaryKey = 'n_id';

    public function users()
    {
        return $this->belongsTo(User::class);
    }


    public function getAll()
    {
        //if (isset(Auth::user()->user_type) && (Auth::user()->user_type == 'Staff')) {
        return $this
            ->join('users', 'members.u_id', '=', 'users.id')
            //->where('user_id', Auth::id())
            ->get();
        // }
        // else{
        //     return $this->model
        //     ->get();
        // }

    }
    
}
