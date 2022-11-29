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
            'company_id' => 'required',
            'title_id' => 'required',
            'city_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required',
        ]);
        //message error Vietnamese
        $messages = [
            'company_id.required' => 'Tên công ty không được để trống',
            'title_id.required' => 'Chức vụ không được để trống',
            'city_id.required' => 'Thành phố không được để trống',
            'start_date.required' => 'Ngày bắt đầu không được để trống',
            'end_date.required' => 'Ngày kết thúc không được để trống',
            'description.required' => 'Mô tả không được để trống',
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
        $experience = $this->experienceService->update($request, $experienceId);
        if (!$experience) {
            return redirect()->route('user')
                             ->with('error', 'Cập nhật thông tin thất bại')
                             ->withInput();
        }

        return redirect()->route('user')->with('success', 'Cập nhật thông tin thành công')->withInput();
    }

}
