<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobType;
use http\Env\Request;

class JobController extends Controller
{

    public function index()
    {
        return view('pages/admin/job/jobList', [
            'jobs'     => Job::orderBy('id', 'DESC')->paginate(5),
            'jobTypes' => JobType::get()
        ]);
    }

    public function showListJob()
    {
        return view('pages/user/jobList', [
            'jobs' => Job::orderBy('id', 'DESC')->paginate(10)
        ]);
    }

    public function showJobDetail(string $jobId)
    {
        $job       = Job::find(['id' => $jobId])->first();
        $jobs      = Job::where('company_id', $job->company->id)->take(6)->get();
        $relateJob = Job::where([
            ['technology_id', '=', $job->technology->id],
            ['id', '!=', $job->id]
        ])->take(6)->get();
        return view('pages/user/jobDetail', [
            'job'          => $job,
            'jobOfCompany' => $jobs,
            'relateJob'   => $relateJob,
            'company'      => $job->company,
        ]);
    }


}
