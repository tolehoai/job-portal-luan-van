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
        //get 5 latest job sort by id
        $jobs = Job::orderBy('id', 'desc')->take(5)->get();
        $cities = City::get();

        return view('pages/user/index', [
            'cities' => $cities,
            'jobs' => $jobs,
        ]);
    }
}
