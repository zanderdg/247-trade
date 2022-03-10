<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
// use Cviebrock\EloquentTaggable\Contracts\Taggable;
// use Cviebrock\EloquentTaggable\Traits\Taggable as TaggableImpl;

class Faq extends Model /*implements Taggable*/ {

    use SoftDeletes;
   // use TaggableImpl;

    protected $dates = ['deleted_at'];

    protected $table = 'faq';

    protected $guarded  = array('id');

}