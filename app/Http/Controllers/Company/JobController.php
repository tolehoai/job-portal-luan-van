<?php

namespace App\Http\Controllers\Company;

use App\Enum\Action;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\CreateCompanyRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\ExperienceYear;
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
use Illuminate\Support\Carbon;
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
            'technologies' => Technology::get(),
            'experienceYear' => ExperienceYear::get()
        ]);
    }

    public function showJobList()
    {
        return view('pages/company/jobList', [
            'company' => Auth::user(),
            //get job list of company with paginate and sort by id desc without service
            'jobs' => Job::where('company_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(10),
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
            //get skill of user and get only name
            $skills = $user->skill->pluck('name')->toArray();
            //concat skill of user and other skill
            if ($user->other_skill) {
                $skills = array_merge($skills, json_decode($user->other_skill));
            }
            $result = [];
            foreach ($skills as $skill) {
                array_push($result, $skill);
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
        $job = $this->jobService->getJobInfo($id);
        //return 404 page if not found job
        if (!$job) {
            return abort(404);
        }

        //find skill of this job and merge this skill into one array
        $skills = $job->skill()->get();
        $skill = [];
        foreach ($skills as $item) {
            $skill[] = $item->name;
        }
        //get job other_skill by json_decode
        //merge $skill with job other_skill if job other_skill is not null
        if ($job->other_skill) {
            $skill = array_merge($skill, json_decode($job->other_skill));
        }
        //sort skill array
        sort($skill);

        //get all user where city of user is same with city of job
        //get city list of this job
//        $cities = $job->city()->get()->toArray();
        //merge city list into one array
//        $city = [];
//        foreach ($cities as $item) {
//            $city[] = $item['id'];
//        }

//        $allUsers =User::whereIn('city_id', $city)->get();

        //find all user in database
        $allUsers = User::all();
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
        $test = User::find(22);
        //merge skill of $test with other_skill of $test

        $suggestUsers = User::whereIn('id', $suitableUsers)->paginate(10);
        //find user of this job
        //get userId of this job
        $users = $job->user()->get();
        //loop through $users and get user id
        foreach ($suggestUsers as $user) {
            $mergeSkill = array_merge($test->skill->pluck('name')->toArray(), json_decode($test->other_skill));
            $user->skill = $mergeSkill;
        }


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
                'jobExperienceYear' => 'required',
            ],
            [
                'jobName.required' => 'B???n ph???i nh???p t??n c??ng ty',
                'jobSalary.required' => 'B???n nh???p s??? l????ng',
                'jobSalary.numeric' => 'B???n ph???i nh???p s??? l????ng l?? s??? nguy??n',
                'jobLevel.required' => 'B???n ph???i ch???n v??? tr?? c??ng vi???c',
                'jobType.required' => 'B???n ph???i ch???n h??nh th???c c??ng vi???c',
                'technologySelect.required' => 'B???n ph???i ch???n l??nh v???c',
                'skillSelect.required' => 'B???n ph???i ch???n k??? n??ng',
                'officeSelect.required' => 'B???n ph???i ch???n v??n ph??ng',
                'jobDesc.required' => 'B???n ph???i nh???p m?? t??? c??ng vi???c',
                'jobRequirement.required' => 'B???n ph???i nh???p y??u c???u c??ng vi???c',
                'jobExperienceYear.required' => 'B???n ph???i ch???n kinh nghi???m',
            ]
        );
        if ($validator->fails()) {
            return redirect()->route('company.addJob')->with('failed', 'Th???t b???i! D??? li???u c?? l???i')
                ->withErrors($validator)
                ->withInput();
        }
        //filter element not number of request to new array
        $otherSkills = array_filter($request->skillSelect, function ($value) {
            return !is_numeric($value);
        });
        //get element of request->skills is not exit in $otherSkills
        $skills = array_diff($request->skillSelect, $otherSkills);
        //add otherSkill to request
        $request->request->add(['otherSkill' => $otherSkills]);


        $job = $this->jobService->store($request);
        if ($job) {
            return redirect()->route('company.jobList')->with('success', 'Th??nh c??ng! C??ng vi???c ???? ???????c t???o')
                ->withInput();
        } else {
            return redirect()->route('company.addJob')->with('failed', 'Th???t b???i! C?? l???i khi t???o c??ng vi???c')
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
                    'error' => 'Kh??ng t??m th???y c??ng vi???c'
                ]);
            }
            //get job info
            $job = $this->jobService->getJobInfo($jobId);
            //get other_skill of this job and json decode if job have other_skill
            $otherSkill = $job->other_skill ? json_decode($job->other_skill) : [];
            return view('pages/company/editJob', [
                'company' => Auth::user(),
                'job' => $job,
                'offices' => Auth::user()->office,
                'jobTypes' => JobType::get(),
                'jobLevels' => JobLevel::get(),
                'skills' => Skill::get(),
                'technologies' => Technology::get(),
                'experienceYears' => ExperienceYear::get(),
                'otherSkill' => $otherSkill
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
                'title.required' => 'B???n ph???i nh???p t??n c??ng ty',
                'salary.required' => 'B???n nh???p s??? l????ng',
                'salary.numeric' => 'B???n ph???i nh???p s??? l????ng l?? s??? nguy??n',
                'job_level_id.required' => 'B???n ph???i ch???n v??? tr?? c??ng vi???c',
                'job_type_id.required' => 'B???n ph???i ch???n h??nh th???c c??ng vi???c',
                'technology_id.required' => 'B???n ph???i ch???n l??nh v???c',
                'skillSelect.required' => 'B???n ph???i ch???n k??? n??ng',
                'officeSelect.required' => 'B???n ph???i ch???n v??n ph??ng',
                'job_desc.required' => 'B???n ph???i nh???p m?? t??? c??ng vi???c',
                'job_requirement.required' => 'B???n ph???i nh???p y??u c???u c??ng vi???c',
            ]
        );
        if ($validator->fails()) {
            return redirect()->route('company.editJob', $jobId)->with('failed', 'Th???t b???i! D??? li???u c?? l???i')
                ->withErrors($validator)
                ->withInput();
        }
        //filter element not number of request to new array
        $otherSkills = array_filter($request->skillSelect, function ($value) {
            return !is_numeric($value);
        });
        //get element of request->skills is not exit in $otherSkills
        $skills = array_diff($request->skillSelect, $otherSkills);
        //add otherSkill to request
        $request->request->add(['otherSkill' => $otherSkills]);
        //replace skillSelect of request by $skills
        $request->request->set('skillSelect', $skills);
        $job = $this->jobService->update($request, $jobId);
        if (!$job) {
            return redirect()->route('company.jobList')->with('failed', 'Th???t b???i! C?? l???i khi c???p nh???t th??ng tin')
                ->withInput();
        } else {
            return redirect()->route('company.jobList')->with('success', 'Th??nh c??ng! Th??ng tin ???? ???????c thay ?????i')
                ->withInput();
        }
    }

    //get User list of this job
    public function showJobCV(string $jobId)
    {
        $job = Job::where([['id', '=', $jobId], ['company_id', '=', Auth::id()]])->first();
        if (!$job) {
            return view('errors.404', [
                'error' => 'Kh??ng t??m th???y c??ng vi???c'
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
                'error' => 'Kh??ng t??m th???y c??ng vi???c'
            ]);
        }
        $user = User::where('id', '=', $userId)->first();
        if (!$user) {
            return view('errors.404', [
                'error' => 'Kh??ng t??m th???y ng?????i d??ng'
            ]);
        }
        $jobUser = User::find($userId)->job()->where('job_id', '=', $jobId)->first();
        if (!$jobUser) {
            return view('errors.404', [
                'error' => 'Kh??ng t??m th???y ng?????i d??ng trong c??ng vi???c'
            ]);
        }


        //Send interview mail if request status is ??ang ph???ng v???n
        if ($request->status == '??ang ph???ng v???n') {
            $this->jobService->sendInvitationMail($job, $user, $request->interview_datetime, $request->interview_address, $request->office_address);
        }
        //send offer mail if request status is Ch??? ph???n h???i
        if ($request->status == 'Ch??? ph???n h???i') {
            //get access_token in pivot table user_job of this user with user_id and job_id
            $accessToken = $jobUser->pivot->access_token;
            //url encode access_token
            $accessToken = urlencode($accessToken);

            $this->jobService->sendOfferMail($job, $user, $request->offer_salary, $request->offer_start_date, $accessToken);
        }
        //send thank you mail if request status is T??? ch???i offer
        if ($request->status == 'T??? ch???i offer') {
            $this->jobService->sendThankyouMailForRejectOffer($user);
        }
        //send thank you mail if request status if Kh??ng ph?? h???p
        if ($request->status == 'Kh??ng ph?? h???p') {
            $this->jobService->sendThankyouMailForNotSuitable($user);
        }

        $jobUser->pivot->status = $request->status;
        $jobUser->pivot->updated_at = Carbon::now();
        $jobUser->pivot->save();
        return redirect()->route('showJobCV', $jobId)->with('success', 'Th??nh c??ng! Tr???ng th??i ???? ???????c thay ?????i')
            ->withInput();
    }

    //delete job
    public function deleteJob(string $jobId)
    {
        $job = Job::where([['id', '=', $jobId], ['company_id', '=', Auth::id()]])->first();
        if (!$job) {
            return view('errors.404', [
                'error' => 'Kh??ng t??m th???y c??ng vi???c'
            ]);
        }
        $job->delete();
        return redirect()->route('company.jobList')->with('success', 'Th??nh c??ng! C??ng vi???c ???? ???????c x??a')
            ->withInput();
    }

    //send invitaion mal of this job to this candidate
    public function sendInvitationMail(Request $request, string $jobId, string $candidateId)
    {
        $job = Job::where([['id', '=', $jobId], ['company_id', '=', Auth::id()]])->first();
        if (!$job) {
            return view('errors.404', [
                'error' => 'Kh??ng t??m th???y c??ng vi???c'
            ]);
        }
        $user = User::where('id', '=', $candidateId)->first();
        if (!$user) {
            return view('errors.404', [
                'error' => 'Kh??ng t??m th???y ng?????i d??ng'
            ]);
        }

        //get link for this job
        $this->jobService->sendIntroduceMail($job, $user);
        return redirect()->route('company.jobDetail', $jobId)->with('success', 'Th??nh c??ng! Email ???? ???????c g???i')
            ->withInput();
    }

    public function showCandidateHistory(string $companyId, string $candidateId)
    {
        $company = Company::where('id', '=', $companyId)->first();
        if (!$company) {
            return view('errors.404', [
                'error' => 'Kh??ng t??m th???y c??ng ty'
            ]);
        }
        $user = User::where('id', '=', $candidateId)->first();
        if (!$user) {
            return view('errors.404', [
                'error' => 'Kh??ng t??m th???y ng?????i d??ng'
            ]);
        }
        $jobs = $this->jobService->getJobListOfCandidateInCompany($companyId, $candidateId);
        $histories = [];
        //loop into $jobs and push value to $histories array

        foreach ($jobs as $job) {
            $histories[] = [
                'jobName' => $job->title,
                'jobUser' => $job->user()->where('user_id', '=', $candidateId)->first(),
                'userStatus' => $job->user()->where('user_id', '=', $candidateId)->first()->pivot->status,
                'timestamp' => $job->user()->where('user_id', '=', $candidateId)->first()->pivot->updated_at
            ];
        }

        return view('pages/company/candidateHistory', [
            'company' => $company,
            'user' => $user,
            'histories' => $histories
        ]);
    }

    public function acceptOffer(string $jobId, string $userId, string $access_token)
    {
        $job = Job::where('id', '=', $jobId)->first();
        if (!$job) {
            return view('errors.404', [
                'error' => 'Kh??ng t??m th???y c??ng vi???c'
            ]);
        }
        $user = User::where('id', '=', $userId)->first();
        if (!$user) {
            return view('errors.404', [
                'error' => 'Kh??ng t??m th???y ng?????i d??ng'
            ]);
        }
        $jobUser = User::find($userId)->job()->where('job_id', '=', $jobId)->first();
        if (!$jobUser) {
            return view('errors.404', [
                'error' => 'Kh??ng t??m th???y ng?????i d??ng trong c??ng vi???c'
            ]);
        }
        //check $access_token with access_token in pivot table user_job, if not match, return 404, else update status
        //decode access_token
        $accessToken = urldecode($access_token);
        if ($access_token != $jobUser->pivot->access_token) {
            return view('errors.404', [
                'error' => 'Kh??ng t??m th???y trang'
            ]);
        }
        $jobUser->pivot->status = 'Ch???p nh???n offer';
        $jobUser->pivot->updated_at = Carbon::now();
        $jobUser->pivot->save();
        //check if user accept this before, if yes return with message
        if ($jobUser->pivot->status == 'Ch???p nh???n offer') {
            return redirect()->route('home.index')->with('success', 'B???n ???? ch???p nh???n offer tr?????c ????')
                ->withInput();
        }
        return redirect()->route('home.index')->with('success', 'B???n ???? ch???p nh???n offer')
            ->withInput();
    }

    public function rejectOffer(string $jobId, string $userId, string $access_token)
    {
        $job = Job::where('id', '=', $jobId)->first();
        if (!$job) {
            return view('errors.404', [
                'error' => 'Kh??ng t??m th???y c??ng vi???c'
            ]);
        }
        $user = User::where('id', '=', $userId)->first();
        if (!$user) {
            return view('errors.404', [
                'error' => 'Kh??ng t??m th???y ng?????i d??ng'
            ]);
        }
        $jobUser = User::find($userId)->job()->where('job_id', '=', $jobId)->first();
        if (!$jobUser) {
            return view('errors.404', [
                'error' => 'Kh??ng t??m th???y ng?????i d??ng trong c??ng vi???c'
            ]);
        }
        if ($jobUser->pivot->status == 'Ch???p nh???n offer') {
            return redirect()->route('home.index')->with('error', 'B???n ???? ch???p nh???n offer tr?????c ????, vui l??ng li??n h??? tr???c ti???p v???i c??ng ty!')
                ->withInput();
        }
        //check $access_token with access_token in pivot table user_job, if not match, return 404, else update status
        if ($access_token != $jobUser->pivot->access_token) {
            return view('errors.404', [
                'error' => 'Kh??ng t??m th???y trang'
            ]);
        }
        $jobUser->pivot->status = 'T??? ch???i offer';
        $jobUser->pivot->updated_at = Carbon::now();
        $jobUser->pivot->save();
        $this->jobService->sendThankyouMailForRejectOffer($user);
        //redirect to url http://127.0.0.1:8000/user/job/processed
        return redirect()->route('home.index', 'processed')->with('error', 'B???n ???? t??? ch???i offer cho c??ng vi???c n??y')
            ->withInput();
    }
}
