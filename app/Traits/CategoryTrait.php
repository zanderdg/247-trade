<?php

namespace App\Traits;

use App\Category;

trait CategoryTrait {

    /**
     * Get Category Name.
     * 
     * @param CategoryID|int
     * @return CategoryName|String
     */
    public function getCategoryName($id){
        return Category::find($id)->name;
    }

    /**
     * Get Category object.
     * 
     * @param CategoryID|int
     * @return Category|Object
     */
    public function getCategoryData($id){
        return Category::find($id);
    }

    /**
     * Get All Categorires data on view.
     * 
     * @return Categories|Array|Object
     */
    public function getAllCategories() {
        $data = Category::where('status', 1)->get();
        return $data;
    }

    

}