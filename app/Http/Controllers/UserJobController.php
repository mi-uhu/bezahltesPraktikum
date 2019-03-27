<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Job;


class UserJobController extends Controller
{
    public function index()
    {
        $jobs = Job::OrderBy('id', 'desc')->paginate(20);

        return view('user.jobs', [
            'jobs' => $jobs
        ]);
    }

    public function show(Job $job)
    {
        $company = $job->company()->first();

        return view('user.job.show', [
            'job' => $job,
            'company' => $company,
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

        return view('user.search', [
            'jobs' => $jobs,
        ]);
    }

}
