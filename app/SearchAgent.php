<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SearchAgent extends Model
{
    public function district ()
    {
        return $this->belongsTo('App\District');
    }

    public function tag ()
    {
        return $this->belongsTo('App\Tag');
    }

    public function user ()
    {
        return $this->belongsTo('App\User');
    }
}
