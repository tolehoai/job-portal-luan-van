<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\User;
use App\Service\CityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


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
        return view('pages/admin/user/detail', [
            'user' => $user,
            'experiences' => $user->experience->sortByDesc('id'),
            'educations' => $user->education->sortByDesc('id'),
        ]);
    }

}
