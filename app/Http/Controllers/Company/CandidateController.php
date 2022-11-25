<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\CreateCompanyRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Job;
use App\Models\User;
use App\Service\CompanyService;
use App\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\ValidationException;
use Termwind\Components\Anchor;

class CandidateController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $page = request()->get('page', 1);
        $users = $this->userService->getAllUserOfCompany(Auth::id());
        $pagination =  new LengthAwarePaginator($users->forPage($page, 10), $users->count(), 10, $page, []);
        return view('pages/company/candidateList', [
            'company' => Auth::user(),
            'users' => $pagination
        ]);
    }

}
