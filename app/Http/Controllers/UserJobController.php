<?php

namespace App\Http\Controllers;

use App\District;
use App\SearchAgent;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Job;


class UserJobController extends Controller
{
    public function index()
    {
        $jobs = Job::OrderBy('id', 'desc')->paginate(20);
        $tags = Tag::all();
        $districts = District::all();
        $showSearchAgent = false;

        return view('user.job.index', [
            'jobs' => $jobs,
            'tags' => $tags,
            'districts' => $districts,
            'showSearchAgent' => $showSearchAgent,
            'emptyMessage' => '<h3>Es sind noch keine Praktika inseriert.</h3>',
        ]);
    }

    public function show(Job $job)
    {
        $company = $job->company()->first();
        $tags = $job->tags()->get();
        $favourite = null;

        $user = auth()->guard('user')->user();
        if( isset($user) )
        {
            $favourite = $job->favourite()->where('user_id', '=', $user->id )->first();
        }

        return view('user.job.show', [
            'job' => $job,
            'company' => $company,
            'tags' => $tags,
            'favourite' => $favourite,
        ]);
    }

    public function search(Request $request)
    {
        $jobs = DB::table('jobs')
            ->join('companies', 'companies.id', '=', 'jobs.company_id')
            ->join('job_tag', 'jobs.id', '=', 'job_tag.job_id')
            ->join('tags', 'job_tag.tag_id', '=', 'tags.id')
            ->where( [
                ['tags.id', '=', $request->what],
                ['companies.district_id', '=', $request->where]
            ] )
            ->select('jobs.id as id',
                'jobs.title as title',
                'jobs.description as description',
                'jobs.logo as logo',
                'companies.id as companyId',
                'companies.name as companyName')
            ->orderBy('jobs.id', 'desc')
            ->paginate(20);
        
        $tags = Tag::all();
        $districts = District::all();
        $selectedTags = Tag::where('id', '=', $request->what)->get();
        $selectedDistricts = District::where('id', '=', $request->where)->get();
        $showSearchAgent = false;
        if( auth()->guard('user')->user() )
        {
            $showSearchAgent = !( SearchAgent::where([
                ['user_id', '=', auth()->guard('user')->user()->id],
                ['tag_id', '=', $request->what],
                ['district_id', '=', $request->where],
            ])->exists() );
        }

        return view('user.job.index', [
            'jobs' => $jobs,
            'tags' => $tags,
            'districts' => $districts,
            'selectedTags' => $selectedTags,
            'selectedDistricts' => $selectedDistricts,
            'showSearchAgent' => $showSearchAgent,
            'title' => 'Suchergebnisse:',
            'emptyMessage' => '<h3>Keine Suchergebnisse mit den gewünschten Kriterien gefunden.
                               <br>Bitte verwende andere Suchkriterien oder schau später wieder vorbei.</h3>',
        ]);
    }

}
