<?php

namespace App\Http\Controllers;

use App\District;
use App\Tag;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        $districts = District::all();
        return view('user.index' , [
            'tags' => $tags,
            'districts' => $districts,
        ]);
    }

}