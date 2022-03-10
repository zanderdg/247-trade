<?php

namespace App\Traits;

use App\User;

trait RelationTraits {

    /**
     * User belongs to many leads.
     *
     * @return BelongsToMany
     */
    public function leads()
    {
        return $this->belongsToMany(User::class, 'leads', 'user_id')->withTimestamps();
    }  

}