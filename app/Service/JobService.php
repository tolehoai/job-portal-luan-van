<?php

namespace App\Service;

use App\Mail\InterviewMail;
use App\Mail\IntroduceMail;
use App\Mail\OfferMail;
use App\Mail\ThankyouMailForNotSuitable;
use App\Mail\ThankyouMailForRejectOffer;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class JobService
{

    private FileStoreService $fileStoreService;

    public function __construct(FileStoreService $fileStoreService)
    {
        $this->fileStoreService = $fileStoreService;
    }

    public function store(Request $request)
    {
        $job = Job::create([
            'title' => $request->get('jobName'),
            'company_id' => Auth::id(),
            'is_active' => 1,
            'salary' => $request->get('jobSalary'),
            'job_level_id' => $request->get('jobLevel'),
            'job_type_id' => $request->get('jobType'),
            'technology_id' => $request->get('technologySelect'),
            'job_desc' => $request->get('jobDesc'),
            'job_requirements' => $request->get('jobRequirement'),
            'experience_year_id' => $request->get('jobExperienceYear'),
            'other_skill' => json_encode(array_values($request->get('otherSkill'))),
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
        $updateData = $request->except('_token');
        $updateData['is_active'] = $request->get('is_active') ? 1 : 0;
        $updateData['other_skill'] = json_encode(array_values($request->get('otherSkill')));
        $job = Job::find($jobId);
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
        //get company_id of this job
        $companyId = $job->company_id;
        if ($request->file('cv') != null) {
            $job->user()->sync(
                [
                    Auth::id() => ['file_id' => $this->fileStoreService->store($request->file('cv'))->id, 'company_id' => $companyId]
                ], false);
        } else {
            $job->user()->sync(
                [
                    Auth::id() => ['company_id' => $companyId]
                ], false);
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

    //send invitation mail to user with job information
    public function sendInvitationMail($job, $user, $interviewDateTime, $interviewAddress)
    {
        Mail::to($user->email)->queue(new InterviewMail($job, $user, $interviewDateTime, $interviewAddress));
    }

    //send offer mail to user with job infomation
    public function sendOfferMail($job, $user, $salary, $startDate)
    {
        Mail::to($user->email)->queue(new OfferMail($job, $user, $salary, $startDate));
    }

    //send sendThankyouMailForRejectOffer to user
    public function sendThankyouMailForRejectOffer($user)
    {
        Mail::to($user->email)->queue(new ThankyouMailForRejectOffer($user));
    }

    //send sendThankyouMailForNotSuitable to user
    public function sendThankyouMailForNotSuitable($user)
    {
        Mail::to($user->email)->queue(new ThankyouMailForNotSuitable($user));
    }

    //send introduce mail to user with job infomation
    public function sendIntroduceMail($job, $user)
    {
        Mail::to($user->email)->queue(new IntroduceMail($job, $user));
    }

    public function getJobListOfCandidateInCompany($companyId, $candidateId)
    {
//       find job_user with company_id and user_id with user detail and job detail and pivot table
        $jobUser = Job::whereHas('user', function ($query) use ($companyId, $candidateId) {
            $query->where('company_id', $companyId)->where('user_id', $candidateId);
        })->with(['user' => function ($query) use ($candidateId) {
            $query->where('user_id', $candidateId);
        }])->get();


//        $jobUser = Job::whereHas('user', function ($query) use ($companyId, $candidateId) {
//            $query->where('company_id', $companyId)->where('user_id', $candidateId);
//        })->get();
        return $jobUser;
    }

    //get skill of job and merge this skill in to array and short this skill with remove duplicate skill id

    public function getSkillOfJob($jobId)
    {
        $job = Job::find($jobId);
        $skills = $job->skill()->get();
        $skillArray = [];
        foreach ($skills as $skill) {
            array_push($skillArray, $skill->id);
        }
        sort($skillArray);
        $skillArray = array_unique($skillArray);
        return $skillArray;
    }
    public function getJobInfo($jobId)
    {
        $job = Job::find($jobId);
        //create job skill object of skill name and id
        $jobSkill = [];
        foreach ($job->skill()->get() as $skill) {
            $jobSkill[] = [
                'id' => $skill->id,
                'name' => $skill->name
            ];
        }
        //get other_skill of job and convert to array with id and name if other_skill is not null
        $otherSkill = [];
        if ($job->other_skill != null) {
            $otherSkill = json_decode($job->other_skill);
            foreach ($otherSkill as $key => $skill) {
                $otherSkill[$key] = [
                    'id' => $key,
                    'name' => $skill
                ];
            }
        }
        //merge job skill and other skill
        $jobSkill = array_merge($jobSkill, $otherSkill);

        $job->skill = $jobSkill;
//        dd($user->skill);
        return $job;
    }
}
