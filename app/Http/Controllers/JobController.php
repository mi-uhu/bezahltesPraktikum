<?php

namespace App\Http\Controllers;

use App\Mail\SearchAgentMessage;
use App\Job;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;


class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('company');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $tags = Tag::all();
        return view('company.job.create', ['tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:20'],
            'logo' => 'nullable|image|max:2048',
            //'titlePicture' => 'nullable|image|max:2048',
            'tag1' => 'required',
            'tag2' => 'nullable',
            'tag3' => 'nullable',
        ]);

        if($request->hasFile('logo'))
        {
            $logoFilenameWithExtension = $request->file('logo')->getClientOriginalName();
            $logoFilename = pathinfo($logoFilenameWithExtension, PATHINFO_FILENAME);
            $logoExtension = $request->file('logo')->getClientOriginalExtension();
            $logoFilenameToStore = $logoFilename . '_' . time() . '.' . $logoExtension;

            $request->file('logo')->storeAs('public/logos', $logoFilenameToStore);
        }
        else $logoFilenameToStore = "noimage.jpg";

//        if($request->hasFile('titlePicture'))
//        {
//            $titlePictureFilenameWithExtension = $request->file('titlePicture')->getClientOriginalName();
//            $titlePictureFilename = pathinfo($titlePictureFilenameWithExtension, PATHINFO_FILENAME);
//            $titlePictureExtension = $request->file('titlePicture')->getClientOriginalExtension();
//            $titlePictureFilenameToStore = $titlePictureFilename . '_' . time() . '.' . $titlePictureExtension;
//
//            $request->file('titlePicture')->storeAs('public/titlePictures', $titlePictureFilenameToStore);
//        }
//        else $titlePictureFilenameToStore = "noimage.jpg";

        $job = new Job();
        $job->title = $request->title;
        $job->description = $request->description;
        $job->company_id = auth()->guard('company')->user()->id;
        $job->logo = $logoFilenameToStore;
//        $job->titlePicture = $titlePictureFilenameToStore;
        $job->save();

        DB::table('job_tag')->insertGetId(
            ['job_id' => $job->id, 'tag_id' => $request->tag1]
        );

        if(isset($request->tag2) && $request->tag2 != -1)
        {
            DB::table('job_tag')->insertGetId(
                ['job_id' => $job->id, 'tag_id' => $request->tag2]
            );
        }

        if(isset($request->tag3) && $request->tag3 != -1)
        {
            DB::table('job_tag')->insertGetId(
                ['job_id' => $job->id, 'tag_id' => $request->tag3]
            );
        }

        return redirect('/company/jobs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        if( $job->company()->first()->id == auth()->guard('company')->user()->id )
        {
            $company = $job->company()->first();
            $tags = $job->tags()->get();
            return view('company.job.show', [
                'job' => $job,
                'company' => $company,
                'tags' => $tags,
            ] );
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        if( $job->company()->first()->id == auth()->guard('company')->user()->id )
        {
            $tags = Tag::all();
            $setTags = $job->tags()->get();
            return view('company.job.edit', [
                'tags' => $tags,
                'job' => $job,
                'setTags' => $setTags,
            ] );
        }
        else
        {
            return redirect()->back();
        }
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
        request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:20'],
            'logo' => 'nullable|image|max:2048',
            ////'titlePicture' => 'nullable|image|max:2048',
            'tag1' => 'required',
            'tag2' => 'nullable',
            'tag3' => 'nullable',
        ]);

        if($request->hasFile('logo'))
        {
            Storage::delete('/public/logos/' . $job->logo);

            $logoFilenameWithExtension = $request->file('logo')->getClientOriginalName();
            $logoFilename = pathinfo($logoFilenameWithExtension, PATHINFO_FILENAME);
            $logoExtension = $request->file('logo')->getClientOriginalExtension();
            $logoFilenameToStore = $logoFilename . '_' . time() . '.' . $logoExtension;

            $request->file('logo')->storeAs('public/logos', $logoFilenameToStore);
        }
        else $logoFilenameToStore = $job->logo;

//        if($request->hasFile('titlePicture'))
//        {
//            Storage::delete('/public/titlePictures/' . $job->titlePicture);

//            $titlePictureFilenameWithExtension = $request->file('titlePicture')->getClientOriginalName();
//            $titlePictureFilename = pathinfo($titlePictureFilenameWithExtension, PATHINFO_FILENAME);
//            $titlePictureExtension = $request->file('titlePicture')->getClientOriginalExtension();
//            $titlePictureFilenameToStore = $titlePictureFilename . '_' . time() . '.' . $titlePictureExtension;
//
//            $request->file('titlePicture')->storeAs('public/titlePictures', $titlePictureFilenameToStore);
//        }
//        else $titlePictureFilenameToStore = $job->titlePicture;

        $job->title = $request->title;
        $job->description = $request->description;
        $job->logo = $logoFilenameToStore;
//        $job->titlePicture = $titlePictureFilenameToStore;
        $job->update();

        DB::table('job_tag')->where('job_id', '=', $job->id )->delete();


        DB::table('job_tag')->insertGetId(
            ['job_id' => $job->id, 'tag_id' => $request->tag1]
        );

        if(isset($request->tag2) && $request->tag2 != -1)
        {
            DB::table('job_tag')->insertGetId(
                ['job_id' => $job->id, 'tag_id' => $request->tag2]
            );
        }

        if(isset($request->tag3) && $request->tag3 != -1)
        {
            DB::table('job_tag')->insertGetId(
                ['job_id' => $job->id, 'tag_id' => $request->tag3]
            );
        }

        $this->notifySearchAgents( $job );

        return redirect('/company/jobs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        DB::table('job_tag')->where('job_id', '=', $job->id)->delete();
        DB::table('favourites')->where('job_id', '=', $job->id)->delete();

        Storage::delete('/public/logos/' . $job->logo);

        $job->delete();

        return redirect()->route('company.jobs.index');
    }

    private function notifySearchAgents(Job $job)
    {
        $districtId = $job->districtId();
        $tags = $job->tags()->pluck('tag_id')->toArray();

        $contacts = DB::table('search_agents')
            ->join('users', 'users.id', '=', 'search_agents.user_id')
            ->whereIn('tag_id', $tags)
            ->where('district_id', '=', 21)
            ->get();

        foreach ($contacts as $contact)
        {
            Mail::to($contact->email)->send(
                new SearchAgentMessage()
            );
        }
    }
}
