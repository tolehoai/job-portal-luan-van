<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Job;
use App\Models\JobType;
use http\Env\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{

    public function index()
    {
//        dd(Job::orderBy('id', 'DESC')->paginate(5)->items()[0]->technology);
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
        $job = Job::find(['id' => $jobId])->first();
//        dd($job->company->toArray());
        $jobs      = Job::where([
            ['company_id', $job->company->id],
            ['id', '!=', $job->id]
        ])->take(5)->get();
        $relateJob = Job::where([
            ['technology_id', '=', $job->technology->id],
            ['id', '!=', $job->id]
        ])->take(6)->get();
        return view('pages/user/jobDetail', [
            'job'          => $job,
            'jobOfCompany' => $jobs,
            'relatesJob'   => $relateJob,
//            'company'      => $job->company,
        ]);
    }



}
