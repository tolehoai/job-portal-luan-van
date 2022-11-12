<?php

namespace App\Http\Controllers\User;


use App\Service\ExperienceService;
use Illuminate\Http\Request;

class ExperienceController
{
    private ExperienceService $experienceService;

    public function __construct(ExperienceService $experienceService)
    {
        $this->experienceService = $experienceService;
    }

    public function addExperience(Request $request, string $userId)
    {
        //validation
        $experience = $this->experienceService->store($request, $userId);
        if (!$experience) {
            return redirect()->route('user')
                             ->with('error', 'Cập nhật thông tin thất bại')
                             ->withInput();
        }

        return redirect()->route('user')->with('success', 'Cập nhật thông tin thành công')->withInput();
    }

    public function editExperience(Request $request, string $experienceId)
    {
        //validation
        $experience = $this->experienceService->update($request, $experienceId);
        if (!$experience) {
            return redirect()->route('user')
                             ->with('error', 'Cập nhật thông tin thất bại')
                             ->withInput();
        }

        return redirect()->route('user')->with('success', 'Cập nhật thông tin thành công')->withInput();
    }
}