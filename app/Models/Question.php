<?php

namespace App\Models;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'questions';

    protected $guarded  = array('id');

    //RelationShip

    public function asso_category() 
    {
        return $this->belongsToMany(SubCategory::class, 'subcategory_questions', 'asso_category');
    }
}
