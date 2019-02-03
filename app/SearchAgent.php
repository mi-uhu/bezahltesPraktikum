<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SearchAgent extends Model
{
    public function state ()
    {
        return $this->belongsTo('App\State');
    }

    public function district ()
    {
        return $this->belongsTo('App\District');
    }

    public function place ()
    {
        if ($this->state() == null)
            return $this->belongsTo('App\State');

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
