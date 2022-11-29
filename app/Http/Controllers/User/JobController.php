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
        //validation if request have cv
        if ($request->hasFile('cv')) {
            $request->validate([
                'cv' => 'required|mimes:pdf,doc,docx|max:2048',
            ]);
        }
        //show error message Vietnamese
        $messages = [
            'cv.required' => 'Vui lòng chọn CV',
            'cv.file' => 'Vui lòng chọn CV',
            'cv.mimes' => 'Vui lòng chọn CV',
            'cv.max' => 'Vui lòng chọn CV',
        ];

        $job = $this->jobService->applyJob($request, $jobId);
        if ($job) {
            return redirect()->back()->with('success', 'Thành công, bạn đã ứng tuyển vị trí này');
        } else {
            return redirect()->back()->with('error', 'Thất bại, có lỗi xảy ra khi ứng tuyển');
        }
    }

}
