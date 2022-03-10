<?php

namespace App\Models;

use App\Models\States;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cities extends Model {

    
    protected $table = 'cities';

    protected $guarded  = array('id');
    
    public $primaryKey = 'id';

    public function states()
    {
        return $this->belongsTo(States::class);
    }


    public function getAllCitiesByStateID($sid)
    {
        //if (isset(Auth::user()->user_type) && (Auth::user()->user_type == 'Staff')) {
        return $this
            //->join('users', 'members.u_id', '=', 'users.id')
            ->select('name', 'id', 'state_id')
            ->where('state_id', $sid)
            ->orderby('name', 'ASC')
            ->get()->toArray();
        // }
        // else{
        //     return $this->model
        //     ->get();
        // }

    }

    public function getCityByID($cityid)
    {
        return $this
            ->where('id', $cityid)
            ->first();
    }
    
}
