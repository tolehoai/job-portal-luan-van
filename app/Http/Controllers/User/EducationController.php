<?php

namespace App\Http\Controllers\User;


use App\Service\EducationService;
use App\Service\ExperienceService;
use Illuminate\Http\Request;

class EducationController
{
    private EducationService $educationService;

    public function __construct(EducationService $educationService)
    {
        $this->educationService = $educationService;
    }

    public function addEducation(Request $request, string $userId)
    {
        //validation
        $education = $this->educationService->store($request, $userId);
        if (!$education) {
            return redirect()->route('user')
                             ->with('error', 'Cập nhật thông tin thất bại')
                             ->withInput();
        }

        return redirect()->route('user')->with('success', 'Cập nhật thông tin thành công')->withInput();
    }

    public function editEducation(Request $request, string $educationId)
    {
        //validation
        $education = $this->educationService->update($request, $educationId);
        if (!$education) {
            return redirect()->route('user')
                             ->with('error', 'Cập nhật thông tin thất bại')
                             ->withInput();
        }

        return redirect()->route('user')->with('success', 'Cập nhật thông tin thành công')->withInput();
    }
}