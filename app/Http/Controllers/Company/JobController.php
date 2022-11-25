<?php

namespace App\Http\Controllers\Company;

use App\Enum\Action;
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
use Illuminate\Support\Arr;
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
            'company' => Auth::user(),
            'offices' => Auth::user()->office->toArray(),
            'jobTypes' => JobType::get()->toArray(),
            'jobLevels' => JobLevel::get()->toArray(),
            'skills' => Skill::get()->toArray(),
            'technologies' => Technology::get()
        ]);
    }

    public function showJobList()
    {

        return view('pages/company/jobList', [
            'company' => Auth::user(),
            'jobs' => Job::where('company_id', Auth::user()->id)->paginate(10)
        ]);
    }

    //Show user of each job
    public function showJobUserList($id)
    {
        $job = Job::find($id);
        $users = $job->user()->paginate(10);
        return view('pages/company/jobUserList', [
            'company' => Auth::user(),
            'job' => $job,
            'users' => $users
        ]);
    }

    public function getAllSkillOfThisUserAndMergeResultToArray($id)
    {
        $user = User::find($id);
        if ($user) {
            $skills = $user->skill()->get();
            $result = [];
            foreach ($skills as $skill) {
                array_push($result, $skill->id);
            }
            //sort $result
            sort($result);
            //merge result into string
            return $result;
        }
        return null;
    }

    public function checkSuitableSkill($arr1, $arr2)
    {
        //intersection of 2 array
        $result = array_intersect($arr1, $arr2);
        //convert result to string
        $result = implode(',', $result);
        //convert $arr1 to string
        $arr1Str = implode(',', $arr1);

        return $result == $arr1Str;
    }

    //show job detail
    public function jobDetail($id)
    {
        $job = Job::find($id);
        //return 404 page if not found job
        if (!$job) {
            return abort(404);
        }
        //find user of this job
        $users = $job->user()->get();

        //find skill of this job and merge this skill into one array
        $skills = $job->skill()->get();
        $skill = [];
        foreach ($skills as $item) {
            $skill[] = $item->id;
        }
        //sort skill array
        sort($skill);

        //get all user where city of user is same with city of job
        //get city list of this job
        $cities = $job->city()->get()->toArray();
        //merge city list into one array
        $city = [];
        foreach ($cities as $item) {
            $city[] = $item['id'];
        }

        $allUsers =User::whereIn('city_id', $city)->get();
        //each user, return user skill
        $userSkill = [];
        foreach ($allUsers as $user) {
            $userSkill[$user->id] = $this->getAllSkillOfThisUserAndMergeResultToArray($user->id);
        }
        //I have a $skill and $userSkill, find in $userSkill, if $skill is in $userSkill, return user
        $suitableUsers = [];
        foreach ($userSkill as $key => $value) {
            if ($this->checkSuitableSkill($skill, $value)) {
                $suitableUsers[] = $key;
            }
        }
        //find user by $suitableUsers list

        $suggestUsers = User::whereIn('id', $suitableUsers)->paginate(10);

        return view('pages/company/jobDetail', [
            'company' => Auth::user(),
            'job' => $job,
            'users' => $users,
            'suggestUsers' => $suggestUsers
        ]);
    }

    public function addJob(Request $request)
    {
        //validation request
        $validator = Validator::make(
            $request->all(),
            [
                'jobName' => 'required|max:255',
                'jobSalary' => 'required',
                'jobSalary' => 'numeric',
                'jobLevel' => 'required',
                'jobType' => 'required',
                'technologySelect' => 'required',
                'skillSelect' => 'required',
                'officeSelect' => 'required',
                'jobDesc' => 'required',
                'jobRequirement' => 'required',
            ],
            [
                'jobName.required' => 'Bạn phải nhập tên công ty',
                'jobSalary.required' => 'Bạn nhập số lương',
                'jobSalary.numeric' => 'Bạn phải nhập số lương là số nguyên',
                'jobLevel.required' => 'Bạn phải chọn vị trí công việc',
                'jobType.required' => 'Bạn phải chọn hình thức công việc',
                'technologySelect.required' => 'Bạn phải chọn lĩnh vực',
                'skillSelect.required' => 'Bạn phải chọn kỹ năng',
                'officeSelect.required' => 'Bạn phải chọn văn phòng',
                'jobDesc.required' => 'Bạn phải nhập mô tả công việc',
                'jobRequirement.required' => 'Bạn phải nhập yêu cầu công việc',
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
                'company' => Auth::user(),
                'job' => $job,
                'offices' => Auth::user()->office,
                'jobTypes' => JobType::get(),
                'jobLevels' => JobLevel::get(),
                'skills' => Skill::get(),
                'technologies' => Technology::get()
            ]);
        }
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|max:255',
                'salary' => 'required',
                'salary' => 'numeric',
                'job_level_id' => 'required',
                'job_type_id' => 'required',
                'technology_id' => 'required',
                'skillSelect' => 'required',
                'officeSelect' => 'required',
                'job_desc' => 'required',
                'job_requirement' => 'required',
            ],
            [
                'title.required' => 'Bạn phải nhập tên công ty',
                'salary.required' => 'Bạn nhập số lương',
                'salary.numeric' => 'Bạn phải nhập số lương là số nguyên',
                'job_level_id.required' => 'Bạn phải chọn vị trí công việc',
                'job_type_id.required' => 'Bạn phải chọn hình thức công việc',
                'technology_id.required' => 'Bạn phải chọn lĩnh vực',
                'skillSelect.required' => 'Bạn phải chọn kỹ năng',
                'officeSelect.required' => 'Bạn phải chọn văn phòng',
                'job_desc.required' => 'Bạn phải nhập mô tả công việc',
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

    //get User list of this job
    public function showJobCV(string $jobId)
    {
        $job = Job::where([['id', '=', $jobId], ['company_id', '=', Auth::id()]])->first();
        if (!$job) {
            return view('errors.404', [
                'error' => 'Không tìm thấy công việc'
            ]);
        }
        $users = $this->jobService->getJobUserList($jobId);

        return view('pages/company/jobUserList', [
            'company' => Auth::user(),
            'job' => $job,
            'users' => $users->all()
        ]);
    }

    //change status of user_id in this job_id
    public function changeCandidateStatus(Request $request, string $jobId, string $userId)
    {
        $job = Job::where([['id', '=', $jobId], ['company_id', '=', Auth::id()]])->first();
        if (!$job) {
            return view('errors.404', [
                'error' => 'Không tìm thấy công việc'
            ]);
        }
        $user = User::where('id', '=', $userId)->first();
        if (!$user) {
            return view('errors.404', [
                'error' => 'Không tìm thấy người dùng'
            ]);
        }
        $jobUser = User::find($userId)->job()->where('job_id', '=', $jobId)->first();
        if (!$jobUser) {
            return view('errors.404', [
                'error' => 'Không tìm thấy người dùng trong công việc'
            ]);
        }


        //Send interview mail if request status is Đang phỏng vấn
        if ($request->status == 'Đang phỏng vấn') {
            $this->jobService->sendInvitationMail($job, $user, $request->interview_datetime, $request->interview_address);
        }
        //send offer mail if request status is Chờ phản hồi
        if ($request->status == 'Chờ phản hồi') {
            $this->jobService->sendOfferMail($job, $user, $request->offer_salary, $request->offer_start_date);
        }
        //send thank you mail if request status is Từ chối offer
        if ($request->status == 'Từ chối offer') {
            $this->jobService->sendThankyouMailForRejectOffer($user);
        }
        //send thank you mail if request status if Không phù hợp
        if ($request->status == 'Không phù hợp') {
            $this->jobService->sendThankyouMailForNotSuitable($user);
        }

        $jobUser->pivot->status = $request->status;
        $jobUser->pivot->save();
        return redirect()->route('showJobCV', $jobId)->with('success', 'Thành công! Trạng thái đã được thay đổi')
            ->withInput();
    }

    //delete job
    public function deleteJob(string $jobId)
    {
        $job = Job::where([['id', '=', $jobId], ['company_id', '=', Auth::id()]])->first();
        if (!$job) {
            return view('errors.404', [
                'error' => 'Không tìm thấy công việc'
            ]);
        }
        $job->delete();
        return redirect()->route('company.jobList')->with('success', 'Thành công! Công việc đã được xóa')
            ->withInput();
    }

    //send invitaion mal of this job to this candidate
    public function sendInvitationMail(Request $request, string $jobId, string $userId)
    {
        $job = Job::where([['id', '=', $jobId], ['company_id', '=', Auth::id()]])->first();
        if (!$job) {
            return view('errors.404', [
                'error' => 'Không tìm thấy công việc'
            ]);
        }
        $user = User::where('id', '=', $userId)->first();
        if (!$user) {
            return view('errors.404', [
                'error' => 'Không tìm thấy người dùng'
            ]);
        }
        $jobUser = User::find($userId)->job()->where('job_id', '=', $jobId)->first();
        if (!$jobUser) {
            return view('errors.404', [
                'error' => 'Không tìm thấy người dùng trong công việc'
            ]);
        }
        //get link for this job
        $this->jobService->sendIntroduceMail($job, $user);
        return redirect()->route('company.jobDetail', $jobId)->with('success', 'Thành công! Email đã được gửi')
            ->withInput();
    }

}
