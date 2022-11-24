<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Job;
use App\Models\JobType;
use App\Models\Technology;
use http\Env\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class JobController extends Controller
{

    public function index()
    {
        $jobs = QueryBuilder::for(Job::class)
            ->allowedFilters([
                'job_type_id',
                'job_level_id',
                'technology_id',
                AllowedFilter::scope('salary'),
                AllowedFilter::scope('city'),
                AllowedFilter::scope('name'),
                AllowedFilter::scope('skill'),
            ]) // filter by title, job_type_id, job_level_id, technology_id, skill_id
            ->allowedSorts([
                'id',
                'title',
                'salary',
            ]) // sort by title, salary
            ->with('jobType', 'jobLevel', 'technology', 'company')
            ->defaultSort('-id')
            ->where('is_active', 1)
            ->paginate(10)
            ->appends(request()->query());
        return view('pages/admin/job/jobList', [
            'jobs' => $jobs,
            'jobTypes' => JobType::get(),
            'cities' => City::get(),
            'technologies' => Technology::get()
        ]);
    }

    public function showListJob()
    {
        $jobs = QueryBuilder::for(Job::class)
            ->allowedFilters([
                'job_type_id',
                'job_level_id',
                'technology_id',
                AllowedFilter::scope('salary'),
                AllowedFilter::scope('city'),
                AllowedFilter::scope('name'),
                AllowedFilter::scope('skill'),
            ]) // filter by title, job_type_id, job_level_id, technology_id, skill_id
            ->allowedSorts([
                'id',
                'title',
                'salary',
            ]) // sort by title, salary
            ->with('jobType', 'jobLevel', 'technology', 'company')
            ->defaultSort('-id')
            ->where('is_active', 1)
            ->paginate(10)
            ->appends(request()->query());

        return view('pages/user/jobList', [
            'jobs' => $jobs,
            'cities' => City::get(),
            'jobTypes' => JobType::get(),
            'technologies' => Technology::get(),
        ]);
    }

    public function showJobDetail(string $jobId)
    {
        $job = Job::find(['id' => $jobId])->first();
        if (!$job) {
            return view('errors.404');
        }
        $jobs = Job::where([
            ['company_id', $job->company->id],
            ['id', '!=', $job->id]
        ]);

        $relateJob = Job::where([
            ['technology_id', '=', $job->technology->id],
            ['id', '!=', $job->id]
        ])->take(6)->get();

        return view('pages/user/jobDetail', [
            'job' => $job,
            'top5CompanyJob' => $jobs->take(5)->get(),
            'relatesJob' => $relateJob,
            'jobOfCompany' => $jobs->count()
        ]);
    }


}
