<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobType;

class JobController extends Controller
{

    public function index()
    {
//        dd(Job::get()->all()[0]->jobLevel->name);
        return view('pages/admin/job/jobList', [
            'jobs'     => Job::orderBy('id', 'DESC')->paginate(5),
            'jobTypes' => JobType::get()
        ]);

    }


}
