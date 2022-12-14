<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\CreateCompanyRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Service\CompanyService;
use App\Service\RatingService;
use App\Service\StatisticService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\ValidationException;
use Termwind\Components\Anchor;

class CompanyController extends Controller
{
    private CompanyService $companyService;
    private RatingService $ratingService;
    private StatisticService $statisticService;


    public function __construct(CompanyService $companyService, RatingService $ratingService, StatisticService $statisticService)
    {
        $this->companyService = $companyService;
        $this->ratingService = $ratingService;
        $this->statisticService = $statisticService;
    }

    public function index()
    {
        //get candidate statistic information: company. job, user, skill, technology, city
        $jobStatistic = $this->statisticService->getJobStatistic(Auth::id());
        $jobStatisticInMonth = $this->statisticService->getJobStatisticInMonth(Auth::id());
        $candidateStatistic = $this->statisticService->getCandidateStatisticByStatus(Auth::id());
        $skillStatistic = $this->statisticService->getSkillStatisticByCompany(Auth::id());
        $jobChartData = $this->statisticService->prepareDataForChart($jobStatistic);
        $jobChartDataInMonth = $this->statisticService->prepareDataForChart($jobStatisticInMonth);
        $candidateChartData = $this->statisticService->prepareDataForChart($candidateStatistic);
        $skillChartData = $this->statisticService->prepareDataForChart($skillStatistic);

        //get company statistic information
        $companyStatistic = $this->statisticService->getCompanyStatistic(Auth::id());
        return view('company/dashboard/index', [
            'company' => Auth::user(),
            'jobChartData' => $jobChartData,
            'jobChartDataInMonth' => $jobChartDataInMonth,
            'candidateChartData' => $candidateChartData,
            'skillChartData' => $skillChartData,
            'companyStatistic' => $companyStatistic,

        ]);
    }

    public function companyInfo()
    {
        return view('pages/company/companyInfo', [
            'company' => Auth::user()
        ]);
    }

    public function removeDuplicaCity($cities, $office)
    {
        $diff = array_diff(array_map('serialize', $cities), array_map('serialize', $office));

        $multidimensional_diff = array_map('unserialize', $diff);

        return $multidimensional_diff;
    }

    public function editCompany(Request $request)
    {
        //Request validation
        $cities = City::get()->toArray();
        $office = Company::where('id', Auth::id())->first()->office->toArray();

        for ($i = 0; $i < count($office); $i++) {
            $office[$i] = Arr::except($office[$i], ["pivot"]);
        }

        $cities = $this->removeDuplicaCity($cities, $office);

        if ($request->method() == 'GET') {
            return view('pages/company/editCompany', [
                'company' => Auth::user(),
                'countrys' => Country::get()->toArray(),
                'cities' => $cities
            ]);
        }
        $company = $this->companyService->update($request);
        if (!$company) {
            return redirect()->route('company.edit')->with('failed', 'Thất bại! Có lỗi khi cập nhật thông tin')
                ->withInput();
        }

        return redirect()->route('company.info')->with('success', 'Thành công! Thông tin đã được thay đổi')
            ->withInput();
    }

    public function ratingCompany(Request $request, $companyId)
    {
        //validation
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'comment' => 'required|string|max:255'
        ]);
        //show message Vietnamese
        $messages = [
            'rating.required' => 'Vui lòng nhập số sao',
            'rating.numeric' => 'Số sao phải là số',
            'rating.min' => 'Số sao phải từ 1 đến 5',
            'rating.max' => 'Số sao phải từ 1 đến 5'
        ];

        $rating = $this->ratingService->rating($request, $companyId);
        if (!$rating) {
            return redirect()->route('company.detail', $companyId)->with('failed', 'Thất bại! Có lỗi khi đánh giá công ty')
                ->withInput();
        }

        return redirect()->route('company.detail', $companyId)->with('success', 'Thành công! Đánh giá công ty thành công')
            ->withInput();
    }


}
