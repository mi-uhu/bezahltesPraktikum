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

    public static function getNameFromId( int $id )
    {
        return District::where('id', '=', $id)->first()->district;
    }

    public static function isDistrictPreselected( $selectedDistricts, District $district, int $districtNr )
    {
        if( $selectedDistricts == null ||
            sizeof($selectedDistricts) < $districtNr ||
        $selectedDistricts[$districtNr - 1]->id != $district->id )
        {
            return false;
        }
        return true;
    }
}
