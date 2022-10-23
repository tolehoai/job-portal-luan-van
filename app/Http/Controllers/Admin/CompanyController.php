<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Country;
use App\Service\CompanyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    private $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function index()
    {
        return view('pages/admin/company/list', [
            'companys' => Company::with('country', 'image')->paginate(15)
        ]);
    }

    public function addCompany(Request $request)
    {
        if ($request->method() == 'GET') {
            return view('pages/admin/company/addCompany', [
                'countrys' => Country::get()->toArray(),
            ]);
        } else {
            dd($this->companyService->store($request));
        }
    }
}
