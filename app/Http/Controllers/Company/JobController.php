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
use Illuminate\Support\Facades\Validator;
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
            'company'      => Auth::user(),
            'offices'      => Auth::user()->office->toArray(),
            'jobTypes'     => JobType::get()->toArray(),
            'jobLevels'    => JobLevel::get()->toArray(),
            'skills'       => Skill::get()->toArray(),
            'technologies' => Technology::get()
        ]);
    }

    public function showJobList()
    {
        return view('pages/company/jobList', [
            'company' => Auth::user(),
            'jobs'    => Job::where('company_id', Auth::user()->id)->paginate(10)
        ]);
    }

    public function addJob(Request $request)
    {
        //validation request
        $validator = Validator::make(
            $request->all(),
            [
                'jobName'          => 'required|max:255',
                'jobSalary'        => 'required',
                'jobSalary'        => 'numeric',
                'jobLevel'         => 'required',
                'jobType'          => 'required',
                'technologySelect' => 'required',
                'skillSelect'      => 'required',
                'officeSelect'     => 'required',
                'jobDesc'          => 'required',
                'jobRequirement'   => 'required',
            ],
            [
                'jobName.required'          => 'Bạn phải nhập tên công ty',
                'jobSalary.required'        => 'Bạn nhập số lương',
                'jobSalary.numeric'         => 'Bạn phải nhập số lương là số nguyên',
                'jobLevel.required'         => 'Bạn phải chọn vị trí công việc',
                'jobType.required'          => 'Bạn phải chọn hình thức công việc',
                'technologySelect.required' => 'Bạn phải chọn lĩnh vực',
                'skillSelect.required'      => 'Bạn phải chọn kỹ năng',
                'officeSelect.required'     => 'Bạn phải chọn văn phòng',
                'jobDesc.required'          => 'Bạn phải nhập mô tả công việc',
                'jobRequirement.required'   => 'Bạn phải nhập yêu cầu công việc',
            ]
        );
        if ($validator->fails()) {
            return redirect()->route('company.addJob')->with('failed', 'Thất bại! Dữ liệu có lỗi')
                             ->withErrors($validator)
                             ->withInput();
        }

        $job = $this->jobService->store($request);
        if ($job) {
            return redirect()->route('company.jobList')->with('success', 'Thành công! Công việc đã được tạo')
                             ->withInput();
        } else {
            return redirect()->route('company.addJob')->with('failed', 'Thất bại! Có lỗi khi tạo công việc')
                             ->withInput();
        }

    }


    public function editJob(Request $request, string $jobId)
    {
        //Request validation
        if ($request->method() == 'GET') {
            $job = Job::where([['id', '=', $jobId], ['company_id', '=', Auth::id()]])->first();
            if (!$job) {
                return view('errors.404', [
                    'error' => 'Không tìm thấy công việc'
                ]);
            }
            return view('pages/company/editJob', [
                'company'      => Auth::user(),
                'job'          => $job,
                'offices'      => Auth::user()->office,
                'jobTypes'     => JobType::get(),
                'jobLevels'    => JobLevel::get(),
                'skills'       => Skill::get(),
                'technologies' => Technology::get()
            ]);
        }
        $validator = Validator::make(
            $request->all(),
            [
                'title'           => 'required|max:255',
                'salary'          => 'required',
                'salary'          => 'numeric',
                'job_level_id'    => 'required',
                'job_type_id'     => 'required',
                'technology_id'   => 'required',
                'skillSelect'     => 'required',
                'officeSelect'    => 'required',
                'job_desc'        => 'required',
                'job_requirement' => 'required',
            ],
            [
                'title.required'           => 'Bạn phải nhập tên công ty',
                'salary.required'          => 'Bạn nhập số lương',
                'salary.numeric'           => 'Bạn phải nhập số lương là số nguyên',
                'job_level_id.required'    => 'Bạn phải chọn vị trí công việc',
                'job_type_id.required'     => 'Bạn phải chọn hình thức công việc',
                'technology_id.required'   => 'Bạn phải chọn lĩnh vực',
                'skillSelect.required'     => 'Bạn phải chọn kỹ năng',
                'officeSelect.required'    => 'Bạn phải chọn văn phòng',
                'job_desc.required'        => 'Bạn phải nhập mô tả công việc',
                'job_requirement.required' => 'Bạn phải nhập yêu cầu công việc',
            ]
        );
        if ($validator->fails()) {
            return redirect()->route('company.editJob', $jobId)->with('failed', 'Thất bại! Dữ liệu có lỗi')
                             ->withErrors($validator)
                             ->withInput();
        }
        $job = $this->jobService->update($request, $jobId);
        if (!$job) {
            return redirect()->route('company.jobList')->with('failed', 'Thất bại! Có lỗi khi cập nhật thông tin')
                             ->withInput();
        } else {
            return redirect()->route('company.jobList')->with('success', 'Thành công! Thông tin đã được thay đổi')
                             ->withInput();
        }
    }

}
