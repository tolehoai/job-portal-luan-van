<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Skill;
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
            'user'   => Auth::user(),
            'skills' => Skill::get(),
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
        dd($request->all());
        $user = $this->userService->update($request);
        if (!$user) {
            return redirect()->route('user')
                             ->with('error', 'Cập nhật thông tin thất bại')
                             ->withInput();
        }

        return redirect()->route('user')->with('success', 'Cập nhật thông tin thành công')->withInput();
    }


    public function editCity(Request $request
    ): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application {
        if ($request->method() == 'GET') {
            return view('pages/admin/city/editCity', [
                "city" => City::where('id', $request->cityId)->first()
            ]);
        }
        $city = $this->cityService->update($request);
        if (!$city) {
            return redirect()->route('admin.edit-city')
                             ->with('error', 'Cập nhật thành phố thất bại')
                             ->withInput();
        }

        return redirect()->route('admin.cities')->with('success', 'Cập nhật thành phố thành công')->withInput();
    }

}
