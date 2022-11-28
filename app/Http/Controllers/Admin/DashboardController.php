<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

        return view('pages/admin/index', [
            'statistic' => $statistic,
            'topCompany' => $topCompanies,
            'topTechnology' => $topTechnologies,
            'topSkill' => $topSkills,
            'topCity' => $topCities,
            'topCompanyRating' => $topCompanyRating,
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
