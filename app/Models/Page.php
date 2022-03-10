<?php

namespace App\Models;

use App\Models\MenuLink;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

//use Cviebrock\EloquentSluggable\SluggableTrait;

class Page extends Model {

    use SoftDeletes;
    use Sluggable;

    protected $dates = ['deleted_at'];

    protected $sluggable = [

        'build_from' => 'title',
        'save_to'    => 'slug',
    ];

     public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $table = 'pages';
    protected $guarded  = array('id');


    public function getPagesList()
    {
        return $this->whereStatus(1)->lists('title', 'id');
    }

    public function menu_links()
    {
        return $this->hasMany(MenuLink::class);
    }
    
    public function getTemplate($slug)
    {
        return $this->where('slug', $slug)->first();
    }

}