<?php

namespace App\Models;

use App\Models\User;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;
    use Sluggable;
    use Taggable;

    protected $table = 'jobs';
    protected $guarded  = array('id');
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 
        'updated_at',
        'deleted_at'
    ];
    

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

    // RelationShip 
    public function Associated_sub_category() {
        return $this->hasOne(SubCategory::class,'id', 'sub_category_id');
    }

    public function homeowner() {
        return $this->hasOne(User::class, 'id', 'owner_id');
    }

    // Tradepeolpes relation
    public function leadPurchaseBy() {
        return $this->belongsToMany(User::class, 'user_leads', 'job_id', 'user_id')
            ->orderBy('created_at', 'desc')
            ->withTimestamps();
    }

}
