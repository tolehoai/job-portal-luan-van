<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\CreateCompanyRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
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
                'companyName.required' => 'Bạn phải nhập tên công ty',
                'countrySelect.required' => 'Bạn phải chọn quốc gia',
                'officeSelect.required' => 'Bạn phải chọn văn phòng',
                'numberOfPersonal.required' => 'Bạn phải nhập số lượng nhân viên',
                'companyDesc.required' => 'Bạn phải nhập mô tả công ty',
                'companyAddress.required' => 'Bạn phải nhập địa chỉ công ty',
                'companyPhone.required' => 'Bạn phải nhập số điện thoại công ty',
                'companyEmail.required' => 'Bạn phải nhập email công ty',
                'companyPassword.required' => 'Bạn pha nhập mật khẩu',
                'startTimeWork.required' => 'Bạn phải nhập giờ bắt đầu làm việc',
                'endTimeWork.required' => 'Bạn phải nhập giờ kết thúc làm việc',
                'imgLogo.required' => 'Bạn phải chọn logo công ty',
                'imgLogo.types' => 'Chọn định dạng file phù hợp dưới đây jpeg, png, jpg, gif, svg',
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
                'companyName.required' => 'Bạn phải nhập tên công ty',
                'countrySelect.required' => 'Bạn phải chọn quốc gia',
                'officeSelect.required' => 'Bạn phải chọn văn phòng',
                'numberOfPersonal.required' => 'Bạn phải nhập số lượng nhân viên',
                'companyDesc.required' => 'Bạn phải nhập mô tả công ty',
                'companyAddress.required' => 'Bạn phải nhập địa chỉ công ty',
                'companyPhone.required' => 'Bạn phải nhập số điện thoại công ty',
                'companyEmail.required' => 'Bạn phải nhập email công ty',
                'startTimeWork.required' => 'Bạn phải nhập giờ bắt đầu làm việc',
                'endTimeWork.required' => 'Bạn phải nhập giờ kết thúc làm việc',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->with('failed', 'Thất bại! Có lỗi khi chỉnh sửa thông tin công ty')
                ->withErrors($validator)
                ->withInput();
        }
        $company = $this->companyService->update($request);
        if (!$company) {

            return redirect()->route('admin.edit-company')->with('failed', 'Thất bại! Có lỗi khi chỉnh sửa thông tin công ty')->withInput();
        }

        return redirect()->route('admin.companyList')->with('success', 'Thành công! Thông tin công ty đã được thay đổi')->withInput();
    }

    //soft delete company
    public function deleteCompany($companyId)
    {
        $company = Company::find($companyId);
        $company->delete();

        return redirect()->route('admin.companyList')->with('success', 'Xóa công ty thành công');
    }
}
