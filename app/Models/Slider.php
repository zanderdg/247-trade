<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//use Cviebrock\EloquentTaggable\Contracts\Taggable;
use Cviebrock\EloquentTaggable\Taggable;

//use Cviebrock\EloquentTaggable\Traits\Taggable as TaggableImpl;

class Slider extends Model {

    use SoftDeletes;
    use Taggable;

    protected $dates = ['deleted_at'];

    protected $table = 'sliders';

    protected $guarded  = array('id');

}