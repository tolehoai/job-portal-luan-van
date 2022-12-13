<?php

namespace App\Service;

use App\Models\City;
use App\Models\Company;
use App\Models\ExperienceYear;
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

    //get top 5 technologies with the highest number of job count by technology name and return to object with status and total
    public function getTopTechnology()
    {
        $topTechnology = DB::table('technology')
            ->join('job', 'job.technology_id', '=', 'technology.id')
            ->select('technology.name as status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->orderBy('total', 'desc')
            ->get();
        return $topTechnology;
    }


    //get skill statistic with skill name and total number of job
    public function getTopSkill()
    {
        $topSkill = DB::table('job_skill')
            ->join('skills', 'job_skill.skill_id', '=', 'skills.id')
            ->select('skills.name as status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->orderBy('total', 'desc')
            ->get();
        return $topSkill;
    }


//find top 10 city with the highest number of job and return by oject of city name and total
    public function getTopCity()
    {
        $topCity = DB::table('cities')
            ->join('city_job', 'city_job.city_id', '=', 'cities.id')
            ->select('cities.name as status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->orderBy('total', 'desc')
            ->take(10)
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

    //get total user in a day group by day for 7 day ago
//    public function getTotalUserByDate()
//    {
//        $totalUser = User::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
//            ->where('created_at', '>=', now()->subDays(7))
//            ->groupBy('date')
//            ->get();
//        return $totalUser;
//    }
//    public function getTotalUserByDate()
//    {
//        $totalUserByDate = User::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
//            ->groupBy('date')
//            ->get()
//            ->toArray();
//        return $totalUserByDate;
//    }

//get user statistic(date, totalUser) by created_at 7 day around
    public function getTotalUserByDate()
    {
        $totalUserByDate = User::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->get()
            ->toArray();
        return $totalUserByDate;
    }

    //get job statistic(date, totalJob) by created_at 7 day around
    public function getTotalJobByDate()
    {
        $totalJobByDate = Job::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->get()
            ->toArray();
        return $totalJobByDate;
    }

    //get company statistic(date, totalCompany) by created_at 7 day around
    public function getTotalCompanyByDate()
    {
        $totalCompanyByDate = Company::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->get()
            ->toArray();
        return $totalCompanyByDate;
    }

    //get job statistic(date, totalJob) by created_at 7 day around
    public function getTotalJobUserByDate()
    {
        $totalJobUserByDate = DB::table('job_user')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->get()
            ->toArray();
        return $totalJobUserByDate;
    }

    //get total visit page by date
    public function getTotalUser7DayAround()
    {
        $user7day = DB::table('users')
            ->select(DB::raw('DATE(created_at) as status'), DB::raw('count(*) as total'))
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('status')
            ->get()
            ->toArray();

        return $user7day;
    }


    public function getCompanyStatistic(string $companyId)
    {
        //get total job of this company
        $totalJob = Job::where('company_id', $companyId)->count();
        //get total candidate of this company
        $totalCandidate =  $totalJobPending = DB::table('job_user')
            ->where('company_id', $companyId)
            ->get()
            ->count();
        //get total job of this company with status 'Chờ xử lý'
        $totalJobPending = DB::table('job_user')
            ->where('company_id', $companyId)
            ->where('status', 'Chờ xử lý')
            ->get()
            ->count();
        //get total job of this company with status 'Đang xử lý'
        $totalJobProcessing = DB::table('job_user')
            ->where('company_id', $companyId)
            ->where('status', 'Đang xử lý')
            ->get()
            ->count();
        //get total job of this company with status 'Chờ phản hồi'
        $totalJobWaitForFeedback = DB::table('job_user')
            ->where('company_id', $companyId)
            ->where('status', 'Chờ phản hồi')
            ->get()
            ->count();
        //get total job of this company with status 'Chấp nhận offer'
        $totalJobAcceptOffer = DB::table('job_user')
            ->where('company_id', $companyId)
            ->where('status', 'Chấp nhận offer')
            ->get()
            ->count();
        //get total job of this company with status 'Từ chối offer'
        $totalJobRejectOffer = DB::table('job_user')
            ->where('company_id', $companyId)
            ->where('status', 'Từ chối offer')
            ->get()
            ->count();
        //get total job of this company with status 'Không phù hợp'
        $totalJobNotSuitable = DB::table('job_user')
            ->where('company_id', $companyId)
            ->where('status', 'Không phù hợp')
            ->get()
            ->count();

        return [
            'totalJob' => $totalJob,
            'totalCandidate' => $totalCandidate,
            'totalJobPending' => $totalJobPending,
            'totalJobProcessing' => $totalJobProcessing,
            'totalJobWaitForFeedback' => $totalJobWaitForFeedback,
            'totalJobAcceptOffer' => $totalJobAcceptOffer,
            'totalJobRejectOffer' => $totalJobRejectOffer,
            'totalJobNotSuitable' => $totalJobNotSuitable,
        ];
    }

    //get statistic of job in this company by 7 day around and return object of date and total
    public function getJobStatisticByDate($id)
    {
        $jobStatisticByDate = DB::table('job')
            ->select(DB::raw('DATE(created_at) as status'), DB::raw('count(*) as total'))
            ->where('company_id', $id)
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('status')
            ->get()
            ->toArray();
        return $jobStatisticByDate;
    }


    //get statistic of status of candidate in this company and return object status and total
    public function getCandidateStatisticByStatus($id)
    {
        $candidateStatisticByStatus = DB::table('job_user')
            ->select('status', DB::raw('count(*) as total'))
            ->where('company_id', $id)
            ->groupBy('status')
            ->get()
            ->toArray();
        return $candidateStatisticByStatus;
    }

    //get statistic of skill of this company and return object technology and total
    public function getSkillStatisticByCompany($id)
    {
        $technologyStatistic = DB::table('job')
            ->join('job_skill', 'job_skill.job_id', '=', 'job.id')
            ->join('skills', 'skills.id', '=', 'job_skill.skill_id')
            ->select('skills.name as status', DB::raw('count(*) as total'))
            ->where('job.company_id', $id)
            ->groupBy('status')
            ->get()
            ->toArray();
        return $technologyStatistic;
    }



    //get statistic of salary by experience year of each technology and return object technology, experience year and total, if null return null

    public function getSalaryStatisticByExperienceYear()
    {
        $salaryStatisticByExperienceYear = DB::table('job')
            ->join('technology', 'technology.id', '=', 'job.technology_id')
            ->join('experience_year', 'experience_year.id', '=', 'job.experience_year_id')
            ->select('technology.name as technology', 'job.experience_year_id as experience_year', 'experience_year.name as name', DB::raw('avg(job.salary) as total'))
            ->groupBy('technology', 'experience_year', 'name')
            ->get()
            ->toArray();

//        //loop in salaryStatisticByExperienceYear and put all array with same technology in one group
//        $salaryStatisticByExperienceYearGroup = [];
//        foreach ($salaryStatisticByExperienceYear as $key => $value) {
//            $salaryStatisticByExperienceYearGroup[$value->technology][] = $value;
//        }
        //get all experience year and return array name of experience year
           $experienceYear = ExperienceYear::all();
        $experienceYearName = [];
        foreach ($experienceYear as $key => $value) {
            $experienceYearName[] = $value->name;
        }
        //loop in $salaryStatisticByExperienceYear and put all array with same technology in one group
        $salaryStatisticByExperienceYearGroup = [];
        foreach ($salaryStatisticByExperienceYear as $key => $value) {
            //find value in experienceYearName not exit in $value.name
            $notExit = array_diff($experienceYearName, [$value->name]);
            //create object with name and total = 0 of $notExit and order by experience year
            $notExitObject = [];
            foreach ($notExit as $key => $valueNotExit) {
                $notExitObject[] = (object) [
                    'technology' => $value->technology,
                    'experience_year' => $key,
                    'name' => $valueNotExit,
                    'total' => 0,
                ];
            }
            //merge $notExitObject and $value
            $salaryStatisticByExperienceYearGroup[$value->technology] = array_merge($notExitObject, [$value]);
            //sort salaryStatisticByExperienceYearGroup by this name of object follow by order of $experienceYearName
            usort($salaryStatisticByExperienceYearGroup[$value->technology], function ($a, $b) use ($experienceYearName) {
                return array_search($a->name, $experienceYearName) - array_search($b->name, $experienceYearName);
            });

        }

        return $salaryStatisticByExperienceYearGroup;
    }



}
