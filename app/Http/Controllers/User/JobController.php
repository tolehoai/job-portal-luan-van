<?php

namespace App\Http\Controllers\User;


use App\Service\EducationService;
use App\Service\ExperienceService;
use App\Service\JobService;
use Illuminate\Http\Request;

class JobController
{
    private JobService $jobService;

    public function __construct(JobService $jobService)
    {
        $this->jobService = $jobService;
    }


    public function applyJob(Request $request, string $jobId)
    {
        $job = $this->jobService->applyJob($request, $jobId);
        if ($job) {
            return redirect()->back()->with('success', 'Thành công, bạn đã ứng tuyển vị trí này');
        } else {
            return redirect()->back()->with('error', 'Thất bại, có lỗi xảy ra khi ứng tuyển');
        }
    }

}