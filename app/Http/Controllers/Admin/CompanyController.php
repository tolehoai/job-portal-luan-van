<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\CreateCompanyRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Job;
use App\Models\Office;
use App\Models\Skill;
use App\Service\CompanyService;
use App\Service\SkillService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
use Yajra\DataTables\DataTables;

class CompanyController extends Controller
{
    private CompanyService $companyService;
    private SkillService $skillService;

    public function __construct(CompanyService $companyService, SkillService $skillService)
    {
        $this->companyService = $companyService;
        $this->skillService = $skillService;
    }

    public function index()
    {
        return view('pages/admin/company/list', [
            'companys' => Company::with('country', 'image')->paginate(15)
        ]);
    }

    public function showAddCompany()
    {
        return view('pages/admin/company/addCompany', [
            'countrys' => Country::get()->toArray(),
            'cities' => City::get()->toArray()
        ]);
    }

    public function addCompany(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'companyName' => 'required|max:255',
                'countrySelect' => 'required',
                'officeSelect' => 'required',
                'numberOfPersonal' => 'required|integer',
                'companyDesc' => 'required',
                'companyOverview' => 'required',
                'companyAddress' => 'required',
                'companyPhone' => 'required',
                'companyEmail' => 'required|email',
                'companyPassword' => 'required',
                'startTimeWork' => 'required',
                'endTimeWork' => 'required',
                'imgLogo' => [
                    'required',
                    File::types(['jpeg', 'png', 'jpg', 'gif', 'svg'])
                        ->min(5)
                        ->max(12 * 1024),
                ],
            ],
            [
                'companyName.required' => 'B???n ph???i nh???p t??n c??ng ty',
                'countrySelect.required' => 'B???n ph???i ch???n qu???c gia',
                'officeSelect.required' => 'B???n ph???i ch???n v??n ph??ng',
                'numberOfPersonal.required' => 'B???n ph???i nh???p s??? l?????ng nh??n vi??n',
                'companyDesc.required' => 'B???n ph???i nh???p m?? t??? c??ng ty',
                'companyOverview.required' => 'B???n ph???i nh???p t???ng quan c??ng ty',
                'companyAddress.required' => 'B???n ph???i nh???p ?????a ch??? c??ng ty',
                'companyPhone.required' => 'B???n ph???i nh???p s??? ??i???n tho???i c??ng ty',
                'companyEmail.required' => 'B???n ph???i nh???p email c??ng ty',
                'companyPassword.required' => 'B???n pha nh???p m???t kh???u',
                'startTimeWork.required' => 'B???n ph???i nh???p gi??? b???t ?????u l??m vi???c',
                'endTimeWork.required' => 'B???n ph???i nh???p gi??? k???t th??c l??m vi???c',
                'imgLogo.required' => 'B???n ph???i ch???n logo c??ng ty',
                'imgLogo.types' => 'Ch???n ?????nh d???ng file ph?? h???p d?????i ????y jpeg, png, jpg, gif, svg',
            ]
        );
        if ($validator->fails()) {
            return redirect()->route('admin.show-add-company')->with('failed', 'Failed! Company not created')
                ->withErrors($validator)
                ->withInput();
        }
        //check if email exit in company
        $checkEmail = Company::where('email', $request->companyEmail)->first();
        if ($checkEmail) {
            return redirect()->route('admin.show-add-company')->with('failed', 'Failed! Company not created')
                ->withErrors(['companyEmail' => 'Email ???? t???n t???i'])
                ->withInput();
        }

        $company = $this->companyService->store($request);
        if ($company) {
            return redirect()->route('admin.companyList')->with('success', 'T???o m???i c??ng ty th??nh c??ng');
        } else {
            return redirect()->route('admin.show-add-company')->with('failed', 'T???o m???i c??ng ty th???t b???i')
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function removeDuplicaCity($cities, $office)
    {
        $diff = array_diff(array_map('serialize', $cities), array_map('serialize', $office));

        $multidimensional_diff = array_map('unserialize', $diff);

        return $multidimensional_diff;
    }

    public function editCompany(Request $request, $companyId)
    {
        //Request validation
        $cities = City::get()->toArray();
        $office = Company::where('id', $companyId)->first()->office->toArray();

        for ($i = 0; $i < count($office); $i++) {
            $office[$i] = Arr::except($office[$i], ["pivot"]);
        }

        $cities = $this->removeDuplicaCity($cities, $office);


        if ($request->method() == 'GET') {
            return view('pages/admin/company/editCompany', [
                "company" => Company::where('id', $companyId)->first(),
                'countrys' => Country::get()->toArray(),
                'cities' => $cities
            ]);
        }
        $validator = Validator::make(
            $request->all(),
            [
                'companyName' => 'required|max:255',
                'countrySelect' => 'required',
                'officeSelect' => 'required',
                'numberOfPersonal' => 'required|integer',
                'companyDesc' => 'required',
                'companyAddress' => 'required',
                'companyPhone' => 'required',
                'companyEmail' => 'required|email',
                'startTimeWork' => 'required',
                'endTimeWork' => 'required',
            ],
            [
                'companyName.required' => 'B???n ph???i nh???p t??n c??ng ty',
                'countrySelect.required' => 'B???n ph???i ch???n qu???c gia',
                'officeSelect.required' => 'B???n ph???i ch???n v??n ph??ng',
                'numberOfPersonal.required' => 'B???n ph???i nh???p s??? l?????ng nh??n vi??n',
                'companyDesc.required' => 'B???n ph???i nh???p m?? t??? c??ng ty',
                'companyAddress.required' => 'B???n ph???i nh???p ?????a ch??? c??ng ty',
                'companyPhone.required' => 'B???n ph???i nh???p s??? ??i???n tho???i c??ng ty',
                'companyEmail.required' => 'B???n ph???i nh???p email c??ng ty',
                'startTimeWork.required' => 'B???n ph???i nh???p gi??? b???t ?????u l??m vi???c',
                'endTimeWork.required' => 'B???n ph???i nh???p gi??? k???t th??c l??m vi???c',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->with('failed', 'Th???t b???i! C?? l???i khi ch???nh s???a th??ng tin c??ng ty')
                ->withErrors($validator)
                ->withInput();
        }
        $company = $this->companyService->update($request);
        if (!$company) {

            return redirect()->route('admin.edit-company')->with('failed', 'Th???t b???i! C?? l???i khi ch???nh s???a th??ng tin c??ng ty')->withInput();
        }

        return redirect()->route('admin.companyList')->with('success', 'Th??nh c??ng! Th??ng tin c??ng ty ???? ???????c thay ?????i')->withInput();
    }

    //soft delete company
    public function deleteCompany($companyId)
    {
        $company = Company::find($companyId);
        $company->delete();

        return redirect()->route('admin.companyList')->with('success', 'X??a c??ng ty th??nh c??ng');
    }

    public function showCompanyList()
    {
        //find all Company with pagination
        $companies = Company::with('office')->paginate(20);
        return view('pages/user/companyList', [
            'companies' => $companies
        ]);
    }

    public function companyDetail($companyId)
    {
        $company = Company::where('id', $companyId)->first();
        //get company rating infomation
        $companyRating = $this->companyService->getRatingInfomation($companyId);


        $latestJob = Job::where('company_id', $companyId)->orderBy('created_at', 'desc')->take(5)->get();

        $jobs = Job::where([
            ['company_id', $companyId]
        ]);


        return view('pages/user/companyDetail', [
            'company' => $company,
            'latestJob' => $latestJob,
            'companyRatingScore' => $companyRating['score'],
            'companyRatingTotal' => $companyRating['total'],
            'companyRating' => $companyRating['rating'],
            'jobOfCompany' => $jobs->count()
        ]);
    }


}
