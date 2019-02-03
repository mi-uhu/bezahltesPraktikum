<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function company ()
    {
        return $this->hasMany('App\Company');
    }

    public function state ()
    {
        return $this->belongsTo('App\District');
    }

    public function searchAgent ()
    {
        return $this->hasMany('App\SearchAgent');
    }
}
