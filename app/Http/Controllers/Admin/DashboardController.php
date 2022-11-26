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

        //find top 5 company the highest number of job
        $topCompany = $this->statisticService->getTopCompany();
        //find top 5 technology the highest number of job
        $topTechnology = $this->statisticService->getTopTechnology();
        //find top 5 skill the highest number of job
        $topSkill = $this->statisticService->getTopSkill();
        //find top 5 city highest number of job
        $topCity = $this->statisticService->getTopCity();
        //find top 5 company the highest number rating
        $topCompanyRating = $this->statisticService->getTopCompanyRating();

        return view('pages/admin/index',[
            'statistic' => $statistic,
            'topCompany' => $topCompany,
            'topTechnology' => $topTechnology,
            'topSkill' => $topSkill,
            'topCity' => $topCity,
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
