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

    public function tags ()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function districtId ()
    {
        return $this::company()->first()->district_id;
    }

    public static function getShortJobDescription( $description )
    {
        if (strlen($description) > 350) {
            $description = substr($description, 0, 350);
            $description = substr($description, 0, strrpos($description, ' ')) . "...";
        }
        return $description;
    }
}
