<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function searchAgents ()
    {
        return $this->hasMany('App\SearchAgent');
    }

    public function jobs ()
    {
        return $this->belongsToMany('App\Job');
    }

    public static function getNameFromId( int $id )
    {
        return Tag::where('id', '=', $id)->first()->tag;
    }

    public static function isTagPreselected( $selectedTags, Tag $tag, int $tagNr)
    {
        if( $selectedTags == null ||
            sizeof($selectedTags) < $tagNr ||
            $selectedTags[$tagNr - 1]->id != $tag->id )
        {
            return false;
        }
        return true;
    }
}
