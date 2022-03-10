<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checkout extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'checkout';

    protected $guarded  = array('id');

    //RelationShip 
}
