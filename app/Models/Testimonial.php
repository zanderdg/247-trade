<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//use Cviebrock\EloquentTaggable\Contracts\Taggable;
//use Cviebrock\EloquentTaggable\Traits\Taggable as TaggableImpl;
use Cviebrock\EloquentTaggable\Taggable;


class Testimonial extends Model {

    use SoftDeletes;
    use Taggable;

    protected $dates = ['deleted_at'];

    protected $table = 'testimonial';

    protected $guarded  = array('id');

}