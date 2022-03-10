<?php

namespace App\Models;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;

class MenuLink extends Model {
    
    protected $table = 'menu_links';
    protected $guarded  = array('id');

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function getPageLink($id)
    {
    	$page = new Page;
        return $page->where('id', $id)->first();
    }

    public function getGolfCourseLink($id)
    {
        $golfCourse = new GolfCourse;
        return $golfCourse->where('id', $id)->first();
    }


}