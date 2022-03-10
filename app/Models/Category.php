<?php

namespace App\Models;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    use Sluggable;
    use Taggable;

    protected $dates = ['deleted_at'];
    protected $table = 'categories';
    protected $guarded  = array('id');
    

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    // RelationShip 

    public function subCategory() {
        return $this->hasMany(SubCategory::class, 'id', 'sub_category_id');
    }
}
