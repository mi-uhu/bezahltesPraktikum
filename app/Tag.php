<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function searchAgent ()
    {
        return $this->hasMany('App\SearchAgent');
    }

    public function job ()
    {
        return $this->belongsToMany('App\Job');
    }
}
