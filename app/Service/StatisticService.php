<?php

namespace App\Service;

use App\Models\City;
use App\Models\Company;
use App\Models\Job;
use App\Models\Skill;
use App\Models\Technology;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StatisticService
{
    //get statistic infomation: company. job, user, skill, technology, city
    public function getAdminStatistic()
    {

        //get total number of each user status in job user table with total of status and conver to array
        $jobUserStatus = DB::table('job_user')
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get()
            ->toArray();
        //get total of user in job_user table
        $totalJobUser = DB::table('job_user')->count();
        //prepare data label
        $jobUserStatusChart = $this->prepareDataForChart($jobUserStatus);
        //get total visit page

        $statistic = [
            'company' => Company::count(),
            'job' => Job::count(),
            'user' => User::count(),
            'skill' => Skill::count(),
            'technology' => Technology::count(),
            'city' => City::count(),
            'jobUserStatus' => $jobUserStatus,
            'totalJobUser' => $totalJobUser,
            'jobUserStatusChart' => $jobUserStatusChart,
        ];
        return $statistic;

    }

    //prepare data label for chartjs
    public function prepareDataForChart($data)
    {
        $labels = [];
        $chartData = [];
        foreach ($data as $item) {
            $labels[] = $item->status;
            $chartData[] = $item->total;

        }
        return [
            'labels' => $labels,
            'data' => $chartData,
        ];
    }

    //find top 5 company the highest number of job
    public function getTopCompany()
    {
        $topCompany = Company::withCount('jobs')
            ->orderBy('jobs_count', 'desc')
            ->take(5)
            ->get();
        return $topCompany;
    }

    //find top 5 technology the highest number of job
    public function getTopTechnology()
    {
        $topTechnology = Technology::withCount('jobs')
            ->orderBy('jobs_count', 'desc')
            ->take(5)
            ->get();
        return $topTechnology;
    }

    //find top 5 skill the highest number of job
    public function getTopSkill()
    {
        $topSkill = Skill::withCount('jobs')
            ->orderBy('jobs_count', 'desc')
            ->take(5)
            ->get();
        return $topSkill;
    }

    //find top 5 city highest number of job
    public function getTopCity()
    {
        $topCity = City::withCount('job')
            ->orderBy('job_count', 'desc')
            ->take(5)
            ->get();
        return $topCity;
    }

    //find top 5 company the highest rating_score
    public function getTopCompanyRating()
    {
        //get top 5 company sort by rating_score
        $topCompanyRating = Company::withCount('jobs')
            ->orderBy('rating_score', 'desc')
            ->take(5)
            ->get();

        return $topCompanyRating;
    }
}
