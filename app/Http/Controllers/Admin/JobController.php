<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\ExperienceYear;
use App\Models\Job;
use App\Models\JobType;
use App\Models\Technology;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;

class JobController extends Controller
{

    public function index()
    {
        $jobs = QueryBuilder::for(Job::class)
            ->allowedFilters([
                'job_type_id',
                'job_level_id',
                AllowedFilter::scope('salary'),
                AllowedFilter::scope('city'),
                AllowedFilter::scope('name'),
                AllowedFilter::scope('skill'),
                AllowedFilter::scope('technology_id'),
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

    public function showListJob(Request $request)
    {
        if ($request->filter) {
            if (isset($request->filter['job_type_id'])) {
                $companySearchJobType = $request->get('filter')['job_type_id'];
            }
            if (isset($request->filter['name'])) {
                $companySearchName = $request->get('filter')['name'];
            }
            if (isset($request->filter['city'])) {
                $companySearchCity = $request->get('filter')['city'];
            }
            if (isset($request->filter['technology_id'])) {
                $companySearchTechnology = $request->get('filter')['technology_id'];
            }
            if (isset($request->filter['salary'])) {
                $companySearchSalary = $request->get('filter')['salary'];
            }
            if (isset($request->filter['experience'])) {
                $companySearchExperience = $request->get('filter')['experience'];
            }
        }
        //init data for $request->filter['technology_id'] if null set empty array
        $jobs = QueryBuilder::for(Job::class)
            ->allowedFilters([
                'job_type_id',
                'job_level_id',
                'technology_id',
                AllowedFilter::scope('salary'),
                AllowedFilter::scope('city'),
                AllowedFilter::scope('name'),
                AllowedFilter::scope('skill'),
                AllowedFilter::scope('experience'),
            ]) // filter by title, job_type_id, job_level_id, technology_id, skill_id
            ->allowedSorts([
                'id',
                'title',
                'salary',
            ]) // sort by title, salary
            ->with('jobType', 'jobLevel', 'technology', 'company')
            ->defaultSort('-id')
            ->where('is_active', 1)
            //add where condition for $request->filter['technology_id'] if it not null
            ->when(isset($request->filter['technology_id']), function ($query) use ($request) {
                return $query->whereHas('technology', function ($query) use ($request) {
                    return $query->where('technology_id', $request->filter['technology_id']);
                });
            })
            ->paginate(10)
            ->appends(request()->query());
        return view('pages/user/jobList', [
            'jobs' => $jobs,
            'cities' => City::get(),
            'jobTypes' => JobType::get(),
            'technologies' => Technology::get(),
            'experiences'=>ExperienceYear::get(),
            'companySearchName' => $companySearchName ?? '',
            'companySearchJobType' => $companySearchJobType ?? [],
            'companySearchCity' => $companySearchCity ?? null,
            'companySearchTechnology' => $companySearchTechnology ?? null,
            'companySearchSalary' => $companySearchSalary ?? null,
            'companySearchExperience' => $companySearchExperience ?? null,
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
