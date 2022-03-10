<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteSetting extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'site_settings';

    protected $guarded  = array('id');

}