<?php

namespace App\Http\Controllers\User;

use App\Models\City;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class IndexController
{
    public function index()
    {
        return view('pages/user/index', [
            'cities' => City::get(),
            'jobs'   => Job::get()->take(5)
        ]);
    }
}