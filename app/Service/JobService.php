<?php

namespace App\Service;

use App\Models\Company;
use App\Models\Job;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class JobService
{

    public function __construct(UploadImageService $uploadImageService)
    {
    }

    public function store(Request $request)
    {
//        dd($request);
        $job = Job::create([
            'title' => $request->get('jobName'),
            'company_id' => Auth::id(),
            'is_active' => 1,
            'salary' => $request->get('jobSalary'),
            'job_level_id' => $request->get('jobLevel'),
            'job_type_id' => $request->get('jobType'),
            'job_desc' => $request->get('jobDesc'),
            'job_requirements' => $request->get('jobRequirement'),
        ]);

        $job->city()->sync($request->officeSelect, false);
        $job->technology()->sync($request->technologySelect, false);
        $job->skill()->sync($request->skillSelect, false);

        return $job;
    }

    /**
     * @throws Exception
     */
    public function update(Request $request)
    {
        //update base information of company
        $company = Company::find(['id' => $request->get('companyId') ?? Auth::id()])->first();
        $company->name = $request->get('companyName');
        $company->company_desc = $request->get('companyDesc');
        $company->address = $request->get('companyAddress');
        $company->phone = $request->get('companyPhone');
        $company->start_work_time = $request->get('startTimeWork');
        $company->end_work_time = $request->get('endTimeWork');
        $company->number_of_personal = $request->get('numberOfPersonal');
        $company->country_id = $request->get('countrySelect');
        $company->office()->sync($request->get('officeSelect'));
        $company->save();
        //update company image

        return $company;

    }
}
