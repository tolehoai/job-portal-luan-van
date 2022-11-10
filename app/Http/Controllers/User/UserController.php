<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Service\CityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function index()
    {
        return view('pages/user/userInfo', [
            'user' => Auth::user()
        ]);
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
