<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\CreateCompanyRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Job;
use App\Models\JobLevel;
use App\Models\JobType;
use App\Models\Office;
use App\Models\Skill;
use App\Models\Technology;
use App\Models\User;
use App\Service\CompanyService;
use App\Service\JobService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\ValidationException;

class JobController extends Controller
{
    private JobService $jobService;

    public function __construct(JobService $jobService)
    {
        $this->jobService = $jobService;
    }

    public function index()
    {
        return view('pages/company/job', [
            'company' => Auth::user(),
            'offices' => Auth::user()->office->toArray(),
            'jobTypes' => JobType::get()->toArray(),
            'jobLevels' => JobLevel::get()->toArray(),
            'skills' => Skill::get()->toArray(),
            'technologies' => Technology::get()->toArray()
        ]);
    }

    public function showJobList()
    {
        return view('pages/company/jobList', [
            'company' => Auth::user(),
            'jobs' => Job::where(['company_id' => Auth::id()])->get()
        ]);
    }

    public function addJob(Request $request)
    {
        //validation request
        $job = $this->jobService->store($request);
        if (!$job) {
            return redirect()->route('company.addJob')->with('failed', 'Failed! Job not created')->withInput();
        }

        return redirect()->route('company.jobList')->with('success', 'Success! Job created')->withInput();
    }


    public function companyInfo()
    {
        return view('pages/company/companyInfo', [
            'company' => Auth::user()
        ]);
    }

    public function editCompany(Request $request)
    {
        //Request validation

        if ($request->method() == 'GET') {
            return view('pages/company/editCompany', [
                'company' => Auth::user(),
                'countrys' => Country::get()->toArray()
            ]);
        }
        $company = $this->companyService->update($request);
        if (!$company) {
            return redirect()->route('company.edit')->with('failed', 'Failed! Company not created')->withInput();
        }

        return redirect()->route('company.info')->with('success', 'Success! Company created')->withInput();
    }

}
