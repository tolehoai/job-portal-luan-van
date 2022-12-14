<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\User;
use App\Service\CityService;
use App\Service\JobService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private JobService $jobService;

    public function __construct(JobService $jobService)
    {
        $this->jobService = $jobService;
    }

    public function index()
    {
        return view('pages/admin/user/list', [
            //get user list with pagination and sort desc by id
            'users' => User::orderBy('id', 'desc')->paginate(10),
        ]);
    }

    //return user detail
    public function userDetail($id)
    {
        $user = User::find($id);
        //return 404 if user not found
        if (!$user) {
            abort(404);
        }

        $jobs = $this->jobService->getJobListOfCandidate($id);
        $histories = [];
        //loop into $jobs and push value to $histories array

        foreach ($jobs as $job) {
            $histories[] = [
                'jobName' => $job->title,
                'jobUser' => $job->user()->where('user_id', '=', $id)->first(),
                'companyName' => $job->company->name,
                'companyLogo' => $job->company->image ? $job->company->image->path :'null',
                'userStatus' => $job->user()->where('user_id', '=', $id)->first()->pivot->status,
                'timestamp' => date('d-m-Y', strtotime($job->user()->where('user_id', '=', $id)->first()->pivot->updated_at)),
            ];
        }
        return view('pages/admin/user/detail', [
            'user' => $user,
            'experiences' => $user->experience->sortByDesc('id'),
            'educations' => $user->education->sortByDesc('id'),
            'histories' => $histories
        ]);
    }


}
