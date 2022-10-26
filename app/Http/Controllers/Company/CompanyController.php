<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\CreateCompanyRequest;
use App\Models\Company;
use App\Models\Country;
use App\Service\CompanyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\ValidationException;

class CompanyController extends Controller
{
    public function index()
    {
        return view('company/dashboard/index');
    }

}
