<?php

namespace App\Http\Controllers;

use App\District;
use App\SearchAgent;
use App\Tag;
use Illuminate\Http\Request;

class SearchAgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $searchagents = SearchAgent::where('user_id', '=', auth()->guard('user')->user()->id )
            ->orderBy('id', 'desc')->get();
        $tags = Tag::all();
        $districts = District::all();

        return view('user.searchAgents.index', [
            'searchAgents' => $searchagents,
            'tags' => $tags,
            'districts' => $districts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sa = new SearchAgent();

        $sa->user_id = auth()->guard('user')->user()->id;
        $sa->tag_id = $request->what;
        $sa->district_id = $request->where;

        $sa->save();

        return redirect()->route('searchagents.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SearchAgent  $searchAgent
     * @return \Illuminate\Http\Response
     */
    public function show(SearchAgent $searchAgent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SearchAgent  $searchAgent
     * @return \Illuminate\Http\Response
     */
    public function edit(SearchAgent $searchAgent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SearchAgent  $searchAgent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SearchAgent $searchAgent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SearchAgent  $searchAgent
     * @return \Illuminate\Http\Response
     */
    public function destroy($searchAgent)
    {
        SearchAgent::find($searchAgent)->delete();
        return redirect()->back();
    }
}
