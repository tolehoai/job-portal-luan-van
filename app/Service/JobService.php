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

    private FileStoreService $fileStoreService;

    public function __construct(FileStoreService $fileStoreService)
    {
        $this->fileStoreService = $fileStoreService;
    }

    public function store(Request $request)
    {
//        dd($request);
        $job = Job::create([
            'title'            => $request->get('jobName'),
            'company_id'       => Auth::id(),
            'is_active'        => 1,
            'salary'           => $request->get('jobSalary'),
            'job_level_id'     => $request->get('jobLevel'),
            'job_type_id'      => $request->get('jobType'),
            'technology_id'    => $request->get('technologySelect'),
            'job_desc'         => $request->get('jobDesc'),
            'job_requirements' => $request->get('jobRequirement'),
        ]);

        $job->city()->sync($request->officeSelect, false);
        $job->skill()->sync($request->skillSelect, false);

        return $job;
    }

    /**
     * @throws Exception
     */
    public function update(Request $request, string $jobId)
    {
        //update base information of company
        $updateData              = $request->except('_token');
        $updateData['is_active'] = $request->get('isActive') ? 1 : 0;
        $job                     = Job::find($jobId);
        $job->update($updateData);
        $job->skill()->sync($request->get('skillSelect', false));
        $job->city()->sync($request->get('officeSelect', false));
        $job->save();
        //update company image

        return $job;
    }

    public function applyJob(Request $request, string $jobId)
    {
        $job = Job::find($jobId);
        if ($request->file('cv') != null) {
            $job->user()->sync(
                [
                    Auth::id() => ['file_id' => $this->fileStoreService->store($request->file('cv'))->id]
                ], false);
        } else {
            $job->user()->sync(Auth::id(), false);
        }

        return $job;
    }

    //getJobUserList($jobId)
    public function getJobUserList($jobId)
    {
        $job = Job::find($jobId);
        $users = $job->user()->paginate(10);
        return $users;
    }
}
