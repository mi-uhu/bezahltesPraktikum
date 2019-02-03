<?php

namespace App\Http\Controllers;

use App\Company;
use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('company');
    }

    public function index()
    {
        $company = auth()->guard('company')->user();
        $jobs = $company->jobs()->orderBy('id', 'desc')->paginate(20);

        return view('company.job.index', [
            'jobs' => $jobs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:20'],
            'logo' => 'nullable|image|max:2048',
            'titlePicture' => 'nullable|image|max:2048',
        ]);

        if($request->hasFile('logo'))
        {
            $logoFilenameWithExtension = $request->file('logo')->getClientOriginalName();
            $logoFilename = pathinfo($logoFilenameWithExtension, PATHINFO_FILENAME);
            $logoExtension = $request->file('logo')->getClientOriginalExtension();
            $logoFilenameToStore = $logoFilename . '_' . time() . '.' . $logoExtension;

            $logoPath = $request->file('logo')->storeAs('public/logos', $logoFilenameToStore);
        }
        else $logoFilenameToStore = "noimage.jpg";

        if($request->hasFile('titlePicture'))
        {
            $titlePictureFilenameWithExtension = $request->file('titlePicture')->getClientOriginalName();
            $titlePictureFilename = pathinfo($titlePictureFilenameWithExtension, PATHINFO_FILENAME);
            $titlePictureExtension = $request->file('titlePicture')->getClientOriginalExtension();
            $titlePictureFilenameToStore = $titlePictureFilename . '_' . time() . '.' . $titlePictureExtension;

            $titlePicturePath = $request->file('titlePicture')->storeAs('public/titlePictures', $titlePictureFilenameToStore);
        }
        else $titlePictureFilenameToStore = "noimage.jpg";

        $job = new Job();
        $job->title = $request->title;
        $job->description = $request->description;
        $job->company_id = auth()->guard('company')->user()->id;
        $job->logo = $logoFilenameToStore;
        $job->titlePicture = $titlePictureFilenameToStore;
        $job->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('company.job.show', ['job' => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }
}
