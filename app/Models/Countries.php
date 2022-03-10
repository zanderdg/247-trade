<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Countries extends Model {

    protected $table = 'countries';

    protected $guarded  = array('id');
    
    public $primaryKey = 'id';

    public function states()
    {
        return $this->hasMany('App\Models\States');
    }


    public function getAll()
    {
        //if (isset(Auth::user()->user_type) && (Auth::user()->user_type == 'Staff')) {
        return $this
            ->join('users', 'members.u_id', '=', 'users.id')
            //->where('user_id', Auth::id())
            ->get()->toArray();
        // }
        // else{
        //     return $this->model
        //     ->get();
        // }

    }

    public function getCountryByID($countryid)
    {
        return $this
            ->where('id', $countryid)
            ->first();
    }
    
}
