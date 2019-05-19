<?php

namespace App\Http\Controllers;

use App\Favourite;
use App\User;
use App\Job;
use Illuminate\Http\Request;

class FavouriteController extends Controller
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
        $user = User::find( auth()->guard('user')->user()->id );
        $favourites = $user->favourites()->select('job_id')->get();
        $jobs = Job::whereIn('id', $favourites )->latest()->paginate(20);

        return view('user.job.index', [
            'jobs' => $jobs,
            'title' => 'Merkliste:',
            'emptyMessage' => '<h3>Du hast noch keine Inserate auf die Merkliste gesetzt. 
                               <br>Um eines auf die List zu setzen, klicke einfach auf "Auf die Merkliste!". </h3>',
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
        $favourite = new Favourite();
        $favourite->job_id = $request->jobId;
        $favourite->user_id = auth()->guard('user')->user()->id;
        $favourite->save();

        return redirect()->route('jobs.show', ['id' => $request->jobId]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function show(Favourite $favourite)
    {        dd('Hello');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function edit(Favourite $favourite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favourite $favourite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favourite $favourite)
    {
        $job = $favourite->job()->first();
        $favourite->delete();
        return redirect()->route('jobs.show', ['id' => $job->id]);
    }
}
