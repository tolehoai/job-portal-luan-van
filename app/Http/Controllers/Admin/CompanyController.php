<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index()
    {
        return view('pages/admin/job/list', [
            'companys' => Company::with('country', 'image')->paginate(15)->items()
        ]);
    }
}
