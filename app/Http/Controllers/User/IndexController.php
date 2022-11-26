<?php

namespace App\Http\Controllers\User;

use App\Models\City;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController
{
    public function index(Request $request)
    {
        $jobs = Job::get()->take(5);
        $cities = City::get();

        return view('pages/user/index', [
            'cities' => $cities,
            'jobs' => $jobs,
        ]);
    }
}
