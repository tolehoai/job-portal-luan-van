<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\CreateCompanyRequest;
use App\Models\Company;
use App\Models\Country;
use App\Models\Skill;
use App\Service\CompanyService;
use App\Service\SkillService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class CompanyController extends Controller
{
    private CompanyService $companyService;
    private SkillService $skillService;

    public function __construct(CompanyService $companyService, SkillService $skillService)
    {
        $this->companyService = $companyService;
        $this->skillService   = $skillService;
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
        ]);
    }

    public function addCompany(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'companyName'      => 'required|max:255',
                'countrySelect'    => 'required',
                'numberOfPersonal' => 'required|integer',
                'companyDesc'      => 'required',
                'companyAddress'   => 'required',
                'companyPhone'     => 'required',
                'companyEmail'     => 'required|email',
                'companyPassword'  => 'required',
                'startTimeWork'    => 'required',
                'endTimeWork'      => 'required',
                'imgLogo'          => [
                    'required',
                    File::types(['jpeg', 'png', 'jpg', 'gif', 'svg'])
                        ->min(5)
                        ->max(12 * 1024),
                ],
            ],
            [
                'companyName.required'      => 'Bạn phải nhập tên công ty',
                'countrySelect.required'    => 'Bạn phải chọn quốc gia',
                'numberOfPersonal.required' => 'Bạn phải nhập số lượng nhân viên',
                'companyDesc.required'      => 'Bạn phải nhập mô tả công ty',
                'companyAddress.required'   => 'Bạn phải nhập địa chỉ công ty',
                'companyPhone.required'     => 'Bạn phải nhập số điện thoại công ty',
                'companyEmail.required'     => 'Bạn phải nhập email công ty',
                'companyPassword.required'  => 'Bạn pha nhập mật khẩu',
                'startTimeWork.required'    => 'Bạn phải nhập giờ bắt đầu làm việc',
                'endTimeWork.required'      => 'Bạn phải nhập giờ kết thúc làm việc',
                'imgLogo.required'          => 'Bạn phải chọn logo công ty',
                'imgLogo.types'             => 'Chọn định dạng file phù hợp dưới đây jpeg, png, jpg, gif, svg',
            ]
        );
        if ($validator->fails()) {
            return redirect()->route('admin.show-add-company')->with('failed', 'Failed! Company not created')
                             ->withErrors($validator)
                             ->withInput();
        }
        $company = $this->companyService->store($request);
        if ($company) {
            return redirect()->route('admin.companyList')->with('success', 'Tạo mới công ty thành công');
        } else {
            return redirect()->route('admin.show-add-company')->with('failed', 'Tạo mới công ty thất bại')
                             ->withErrors($validator)
                             ->withInput();
        }
    }
}
