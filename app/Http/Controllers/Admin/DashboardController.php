<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExperienceYear;
use App\Service\StatisticService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private StatisticService $statisticService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StatisticService $statisticService)
    {
        $this->statisticService = $statisticService;
    }

    public function index()
    {
        //get statistic information: company. job, user, skill, technology, city
        $statistic = $this->statisticService->getAdminStatistic();

        //find the top 5 companies with the highest  number of jobs
        $topCompanies = $this->statisticService->getTopCompany();
        //find the top 5 technologies with the highest number of job
        $topTechnologies = $this->statisticService->getTopTechnology();
        //find the top 5 skills with the highest number of job
        $topSkills = $this->statisticService->getTopSkill();
        //find the top 5 cities with the highest number of job
        $topCities = $this->statisticService->getTopCity();
        //find the top 5 companies with the highest number rating
        $topCompanyRating = $this->statisticService->getTopCompanyRating();
        //find salary average of each technology by experience year
        $salaryStatistic = $this->statisticService->getSalaryStatisticByExperienceYear();
        $salaryExperienceYearColor = ['#ee6b6e', '#f94449','#f01e2c','#de0a26','#c30010'];
        //get total user by created_at
        $userStatistic = $this->statisticService->getTotalUser7DayAround();
        //map $userStatistic to chart data
        $userChartData = $this->statisticService->prepareDataForChart($userStatistic);
        $technologyChartData = $this->statisticService->prepareDataForChart($topTechnologies);
        $skillChartData = $this->statisticService->prepareDataForChart($topSkills);
        $cityChartData = $this->statisticService->prepareDataForChart($topCities);

        $technologyChartData = $this->statisticService->prepareDataForChart($topTechnologies);
        return view('pages/admin/index', [
            'statistic' => $statistic,
            'topCompanies' => $topCompanies,
            'topTechnology' => $topTechnologies,
            'topSkill' => $topSkills,
            'topCity' => $topCities,
            'topCompanyRating' => $topCompanyRating,
            'userStatistic' => $userStatistic,
            'userChartData' => $userChartData,
            'technologyChartData' => $technologyChartData,
            'skillChartData' => $skillChartData,
            'cityChartData' => $cityChartData,
            'salaryStatistic' => $salaryStatistic,
            'experienceYear'=>ExperienceYear::get(),
            'salaryExperienceYearColor' => $salaryExperienceYearColor
        ]);
    }

    public function dashboard()
    {
        return view('admin.dashboard.index');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
