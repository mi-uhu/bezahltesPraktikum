<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function company ()
    {
        return $this->belongsTo('App\Company');
    }

    public function favourite ()
    {
        return $this->hasMany('App\Favourite');
    }

    public function tag ()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function district ()
    {
        return $this::company()->district();
    }

    public static function getShortJobDescription( $description )
    {
        if (strlen($description) > 350) {
            $description = substr($description, 0, 300);
            $description = substr($description, 0, strrpos($description, ' ')) . " ...";
        }
        return $description;
    }
}
