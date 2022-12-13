<?php

namespace App\Http\Controllers\User;


use App\Service\EducationService;
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
        $request->validate([
            'company_name' => 'required',
            'title_id' => 'required',
            'start_date' => 'required',
            'desc' => 'required',
        ]);
        //message error Vietnamese
        $messages = [
            'company_name.required' => 'Tên công ty không được để trống',
            'title_id.required' => 'Chức vụ không được để trống',
            'start_date.required' => 'Ngày bắt đầu không được để trống',
            'desc.required' => 'Mô tả không được để trống',
        ];

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
        $request->validate([
            'company_name' => 'required',
            'title_id' => 'required',
            'start_date' => 'required',
            'desc' => 'required',
        ]);
        //message error Vietnamese
        $messages = [
            'company_name.required' => 'Tên công ty không được để trống',
            'title_id.required' => 'Chức vụ không được để trống',
            'start_date.required' => 'Ngày bắt đầu không được để trống',
            'desc.required' => 'Mô tả không được để trống',
        ];

        $experience = $this->experienceService->update($request, $experienceId);
        if (!$experience) {
            return redirect()->route('user')
                ->with('error', 'Cập nhật thông tin thất bại')
                ->withInput();
        }

        return redirect()->route('user')->with('success', 'Cập nhật thông tin thành công')->withInput();
    }

    public function deleteExperience(string $experienceId, string $userId)
    {
        $experience = $this->experienceService->delete($experienceId, $userId);
        if (!$experience) {
            return redirect()->route('user')
                ->with('error', 'Cập nhật thông tin thất bại')
                ->withInput();
        }

        return redirect()->route('user')->with('success', 'Cập nhật thông tin thành công')->withInput();
    }

}
