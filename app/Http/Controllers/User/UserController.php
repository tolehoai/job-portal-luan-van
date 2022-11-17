<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Skill;
use App\Models\Title;
use App\Models\User;
use App\Service\CityService;
use App\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('pages/user/userInfo', [
            'user'        => Auth::user(),
            'skills'      => Skill::get(),
            'titles'      => Title::get(),
            'experiences' => Auth::user()->experience->sortByDesc('id'),
            'educations'  => Auth::user()->education->sortByDesc('id')
        ]);
    }

    public function update(Request $request)
    {
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
    public function showCV($userId)
    {
        $user = User::find($userId);
        if (!$user) {
            return redirect()->route('home.index')
                             ->with('error', 'Không tìm thấy thông tin người dùng')
                             ->withInput();
        }

        return view('pages/user/cv', [
            'user'        => $user,
            'skills'      => Skill::get(),
            'titles'      => Title::get(),
            'experiences' => $user->experience->sortByDesc('id'),
            'educations'  => $user->education->sortByDesc('id')
        ]);
    }

    //show job of user
    public function showJobOfUser()
    {
        //get all job of user with pagination
        $jobs = Auth::user()->job()->paginate(5);
        
        return view('pages/user/userJob', [
            //get job with 5 item per page
            'jobs' => $jobs,
            'user' => Auth::user()
        ]);
    }

}
