<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\CreateCompanyRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Service\CompanyService;
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

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function index()
    {
        return view('company/dashboard/index', [
            'company' => Auth::user()
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
                'company'  => Auth::user(),
                'countrys' => Country::get()->toArray(),
                'cities'   => $cities
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

}
