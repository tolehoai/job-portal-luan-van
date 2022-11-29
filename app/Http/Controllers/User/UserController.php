<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Company;
use App\Models\File;
use App\Models\Job;
use App\Models\Skill;
use App\Models\Title;
use App\Models\User;
use App\Service\CityService;
use App\Service\JobService;
use App\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    private UserService $userService;
    private JobService $jobService;

    public function __construct(UserService $userService, JobService $jobService)
    {
        $this->userService = $userService;
        $this->jobService = $jobService;
    }

    public function index()
    {
        return view('pages/user/userInfo', [
            'user' => Auth::user(),
            'skills' => Skill::get(),
            'titles' => Title::get(),
            'experiences' => Auth::user()->experience->sortByDesc('id'),
            'educations' => Auth::user()->education->sortByDesc('id'),
            'cities' => City::get(),
        ]);
    }

    public function update(Request $request)
    {
        //validation request
        $request->validate([
            'name' => 'required',
            'city_id' => 'required|email',
            'title_id' => 'required|numeric',
            'phone' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        //message error Vietnamese
        $messages = [
            'name.required' => 'Tên không được để trống',
            'city_id.required' => 'Thành phố không được để trống',
            'title_id.required' => 'Chức vụ không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'avatar.image' => 'Ảnh không đúng định dạng',
            'avatar.mimes' => 'Ảnh không đúng định dạng',
            'avatar.max' => 'Ảnh không được quá 2MB',
        ];

        $user = $this->userService->update($request);
        if (!$user) {
            return redirect()->route('user')
                ->with('error', 'Cập nhật thông tin thất bại')
                ->withInput();
        }

        return redirect()->route('user')->with('success', 'Cập nhật thông tin thành công')->withInput();
    }

    public function updateSkill(Request $request)
    {
        $user = $this->userService->updateUserSkill($request);
        if (!$user) {
            return redirect()->route('user')
                ->with('error', 'Cập nhật thông tin thất bại')
                ->withInput();
        }

        return redirect()->route('user')->with('success', 'Cập nhật thông tin thành công')->withInput();
    }

    //show cv of user
    public function showOnlyCV(string $candidateId)
    {
        $user = User::find($candidateId);
        return view('pages/user/cv', [
            'user' => $user,
            'skills' => Skill::get(),
            'titles' => Title::get(),
            'experiences' => $user->experience->sortByDesc('id'),
            'educations' => $user->education->sortByDesc('id'),
            'filePath' => null
        ]);
    }

    //show cv of user
    public function showCV($userId, $jobId)
    {
        $job = Job::find($jobId);
        $user = $job->user()->find($userId);
        if (!$user) {
            return redirect()->route('home.index')
                ->with('error', 'Không tìm thấy thông tin người dùng')
                ->withInput();
        }
        //get file path by user_id and job_id
        $file_id = $user->pivot->file_id;
        if ($file_id != null) {
            $file = File::find($file_id);
            $filePath = $file->path;
        } else {
            $filePath = null;
        }
        return view('pages/user/cv', [
            'user' => $user,
            'skills' => Skill::get(),
            'titles' => Title::get(),
            'experiences' => $user->experience->sortByDesc('id'),
            'educations' => $user->education->sortByDesc('id'),
            'filePath' => $filePath
        ]);
    }

    //show cv of job
    public function showJobCV($jobId)
    {
        $job = Job::find($jobId);
        $users = $job->user()->paginate(10);
        return view('pages/company/jobUserList', [
            'job' => $job,
            'users' => $users,
            'company' => Company::find($job->company_id)
        ]);
    }


    //download cv of user
    public function downloadCV($userId)
    {
        $user = User::find($userId);
        if (!$user) {
            return redirect()->route('home.index')
                ->with('error', 'Không tìm thấy thông tin người dùng')
                ->withInput();
        }

        $pdf = \PDF::loadView('pages/user/cv', [
            'user' => $user,
            'skills' => Skill::get(),
            'titles' => Title::get(),
            'experiences' => $user->experience->sortByDesc('id'),
            'educations' => $user->education->sortByDesc('id')
        ]);
        return $pdf->download('cv.pdf');
    }

    //show job of user
    public function showJobOfUser(string $status)
    {
        //check $status if not equa all, pending, processed return 404 page
        if ($status != 'all' && $status != 'pending' && $status != 'processed') {
            return abort(404);
        }
        //get current auth user
        $user = Auth::user();
        $jobs = $user->job();

        //get all job of user with pagination
        if ($status == 'all') {
            $jobs = $user->job()->paginate(5);
        } elseif ($status == 'pending') {
            //Find job of user where status are Chờ xử lý
            $jobs = $user->job()->wherePivot('status', 'Chờ xử lý')->paginate(5);
        } elseif ($status == 'processed') {
            //Find job of this user where status in pivot table are not equa Chờ xử lý
            $jobs = $user->job()->wherePivot('status', '!=', 'Chờ xử lý')->paginate(5);
        }
        return view('pages/user/userJob', [
            'jobs' => $jobs,
            'user' => Auth::user(),
            'status' => $status
        ]);
    }


    //delete user
    public function deleteUser($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('home.index')
                ->with('error', 'Không tìm thấy thông tin người dùng')
                ->withInput();
        }
        $user->delete();

        return redirect()->route('home.index')
            ->with('success', 'Xóa người dùng thành công')
            ->withInput();
    }
}
