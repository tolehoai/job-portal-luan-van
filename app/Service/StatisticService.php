<?php

namespace App\Service;

use App\Models\City;
use App\Models\Company;
use App\Models\ExperienceYear;
use App\Models\Job;
use App\Models\Skill;
use App\Models\Technology;
use App\Models\User;
use Illuminate\Support\Carbon;
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

    public function getTotalUserMonthAround()
    {
        $userMonth = DB::table('users')
            ->select(DB::raw('DATE(created_at) as status'), DB::raw('count(*) as total'))
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('status')
            ->get()
            ->toArray();

        //map $userMonth data with 30 day ago
        return $this->mapDataWith30DayAgo($userMonth);
    }

    public function mapDataWith30DayAgo($data)
    {
        $dataMap = [];
        $date = now()->subDays(30);
        for ($i = 0; $i < 30; $i++) {
            $dataMap[$i]['status'] = $date->format('Y-m-d');
            $dataMap[$i]['total'] = 0;
            foreach ($data as $item) {
                if ($item->status == $date->format('Y-m-d')) {
                    $dataMap[$i]['total'] = $item->total;
                }
            }
            $date->addDay();
        }
        //convert array to object and return
        return json_decode(json_encode($dataMap));
    }


    public function getCompanyStatistic(string $companyId)
    {
        //get total job of this company
        $totalJob = Job::where('company_id', $companyId)->count();
        //get total candidate of this company
        $totalCandidate = $totalJobPending = DB::table('job_user')
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

    //get statistic of job in this company by 7 day around and return object of date and total if date is not exist, total = 0
    public function getJobStatistic(string $companyId)
    {
        $jobStatistic = DB::table('job_user')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
            ->where('company_id', $companyId)
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->get()
            ->toArray();

        return $this->getJobStatisticByDate($jobStatistic);
    }


    //get statistic of job in this company by 7 day around and return object of date and total if date is not exist, total = 0
    public function getJobStatisticByDate($jobStatistic)
    {
        $jobStatisticByDate = [];
        $date = [];
        $total = [];
        foreach ($jobStatistic as $item) {
            $date[] = $item->date;
            $total[] = $item->total;
        }
        for ($i = 0; $i < 7; $i++) {
            $date7day = now()->subDays($i)->format('Y-m-d');
            if (in_array($date7day, $date)) {
                $jobStatisticByDate[] = [
                    'date' => $date7day,
                    'total' => $total[array_search($date7day, $date)]
                ];
            } else {
                $jobStatisticByDate[] = [
                    'date' => $date7day,
                    'total' => 0
                ];
            }
        }
        //convert date of $jobStatisticByDate to d-m-Y sort jobStatistic by date asc
        foreach ($jobStatisticByDate as $key => $row) {
            $date[$key] = $row['date'];
        }
        array_multisort($date, SORT_ASC, $jobStatisticByDate);

        //convert date of $jobStatisticByDate to d-m-Y
        foreach ($jobStatisticByDate as $key => $item) {
            $jobStatisticByDate[$key]['status'] = Carbon::parse($item['date'])->format('d-m-Y');
        }
        return json_decode(json_encode($jobStatisticByDate));
    }

    public function getJobStatisticInMonth(string $companyId)

    {
        $jobStatistic = DB::table('job_user')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
            ->where('company_id', $companyId)
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->get()
            ->toArray();

        $jobStatisticByMonth = [];
        $date = now()->subDays(30);
        for ($i = 0; $i < 30; $i++) {
            $jobStatisticByMonth[$i]['status'] = $date->format('Y-m-d');
            $jobStatisticByMonth[$i]['total'] = 0;
            foreach ($jobStatistic as $item) {
                if ($item->date == $date->format('Y-m-d')) {
                    $jobStatisticByMonth[$i]['total'] = $item->total;
                }
            }
            $date->addDay();
        }
        //format date of $jobStatisticByMonth to d-m-Y
        foreach ($jobStatisticByMonth as $key => $item) {
            $jobStatisticByMonth[$key]['status'] = Carbon::parse($item['status'])->format('d-m-Y');
        }
        return json_decode(json_encode($jobStatisticByMonth));
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
        //get all experience year and return array name of experience year
        $experienceYear = ExperienceYear::all();
        $experienceYearName = [];
        foreach ($experienceYear as $key => $value) {
            $experienceYearName[] = $value->name;
        }

        //get all technology have job and return array name of technology
        $technologyName= $this->getTechnologyHaveJob();
        //each technologyName, create array with key is technology name and value is array of experience year name
        $salaryStatisticByExperienceYearByTechnology = [];
        foreach ($technologyName as $key => $value) {
            $salaryStatisticByExperienceYearByTechnology[$value] = $experienceYearName;
        }
        //loop through $salaryStatisticByExperienceYearByTechnology, at value of each key, create array with key is experience year name and value salary average
        foreach ($salaryStatisticByExperienceYearByTechnology as $key => $value) {
            foreach ($value as $key1 => $value1) {
                $salaryStatisticByExperienceYearByTechnology[$key][$value1] = 0;
            }
        }
        //loop through $salaryStatisticByExperienceYear, at value of each key, create array with key is experience year name and value salary average
        foreach ($salaryStatisticByExperienceYear as $key => $value) {
            $salaryStatisticByExperienceYearByTechnology[$value->technology][$value->name] = $value->total;
        }
        //in $salaryStatisticByExperienceYearByTechnology, remove element with key is numberic
        foreach ($salaryStatisticByExperienceYearByTechnology as $key => $value) {
            foreach ($value as $key1 => $value1) {
                if (is_numeric($key1)) {
                    unset($salaryStatisticByExperienceYearByTechnology[$key][$key1]);
                }
            }
        }


        //each $salaryStatisticByExperienceYearByTechnologyTotal value, create object with name is experience year name and total is value
        foreach ($salaryStatisticByExperienceYearByTechnology as $key => $value) {
            $salaryStatisticByExperienceYearByTechnology[$key] = array_map(function ($key, $value) {
                return (object)['name' => $key, 'total' => $value];
            }, array_keys($value), $value);
        }
//        dd($salaryStatisticByExperienceYearByTechnology);
        return $salaryStatisticByExperienceYearByTechnology;


//        //get average salary of each technology and experience year and if null return 0
//        foreach ($salaryStatisticByExperienceYearByTechnology as $key => $value) {
//            foreach ($value as $key1 => $value1) {
//                if (!isset($salaryStatisticByExperienceYearByTechnologyTotal[$key][$key1])) {
//                    $salaryStatisticByExperienceYearByTechnologyTotal[$key][$key1] = 0;
//                }
//            }
//        }
//        //map array of salaryStatisticByExperienceYearByTechnologyTotal with each value add key name is $experienceYearName
//        $salaryStatisticByExperienceYearByTechnologyTotal = array_map(function ($item) use ($experienceYearName) {
//            return array_combine($experienceYearName, $item);
//        }, $salaryStatisticByExperienceYearByTechnologyTotal);
//        //map array of value of salaryStatisticByExperienceYearByTechnologyTotal to object with name experience year total is total
//        $salaryStatisticByExperienceYearByTechnologyTotal = array_map(function ($item) {
//            return array_map(function ($value, $key) {
//                return (object)['experience_year' => $key, 'total' => $value];
//            }, $item, array_keys($item));
//        }, $salaryStatisticByExperienceYearByTechnologyTotal);
//        return $salaryStatisticByExperienceYearByTechnologyTotal;
    }

    //get all technology have job, it don't have job, don't return this technology, and return name of technology
    public function getTechnologyHaveJob()
    {
        $technologyHaveJob = DB::table('job')
            ->join('technology', 'technology.id', '=', 'job.technology_id')
            ->select('technology.name as technology')
            ->groupBy('technology')
            ->get()
            ->toArray();
        $technologyName = [];
        foreach ($technologyHaveJob as $key => $value) {
            $technologyName[] = $value->technology;
        }
        return $technologyName;
    }



}
