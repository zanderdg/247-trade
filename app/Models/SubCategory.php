<?php

namespace App\Models;

use App\Models\Job;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use SoftDeletes;
    use Sluggable;
    use Taggable;

    protected $dates = ['deleted_at'];
    protected $table = 'sub_categories';
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
    public function Associated_Category() {
        return $this->hasOne(Category::class,'id', 'category_id');
    }

    public function Associated_jobs() {
        return $this->hasMany(Job::class);
    }

    public function questions() {
        return $this->belongsToMany(Question::class, 'subcategory_questions', 'asso_category','question_id')->withTimestamps();
    }
}
