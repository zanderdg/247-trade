<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PageMeta extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'page_meta';

    protected $guarded  = array('id');
    
}