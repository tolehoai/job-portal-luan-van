<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\CreateCompanyRequest;
use App\Models\Company;
use App\Models\Country;
use App\Service\CompanyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\ValidationException;

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

    public function editCompany(Request $request)
    {
        //Request validation

        if ($request->method() == 'GET') {
            return view('pages/company/editCompany', [
                'company'  => Auth::user(),
                'countrys' => Country::get()->toArray()
            ]);
        }
        $company = $this->companyService->update($request);
        if (!$company) {
            return redirect()->route('company.edit')->with('failed', 'Failed! Company not created')->withInput();
        }

        return redirect()->route('company.info')->with('success', 'Success! Company created')->withInput();
    }

}
