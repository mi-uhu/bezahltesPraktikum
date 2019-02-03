<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    public function job ()
    {
        return $this->belongsTo('App\Job');
    }

    public function user ()
    {
        return $this->belongsTo('App\User');
    }
}
