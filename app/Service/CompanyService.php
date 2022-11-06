<?php

namespace App\Service;

use App\Models\Company;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CompanyService
{
    private $uploadImageService;

    public function __construct(UploadImageService $uploadImageService)
    {
        $this->uploadImageService = $uploadImageService;
    }

    public function store(Request $request)
    {
        $company = Company::create([
            'name' => $request->get('companyName'),
            'company_desc' => $request->get('companyDesc'),
            'address' => $request->get('companyAddress'),
            'email' => $request->get('companyEmail'),
            'password' => Hash::make($request->get('companyPassword')),
            'phone' => $request->get('companyPhone'),
            'start_work_time' => $request->get('startTimeWork'),
            'end_work_time' => $request->get('endTimeWork'),
            'number_of_personal' => $request->get('numberOfPersonal'),
            'country_id' => $request->get('countrySelect'),
        ]);

        $company->office()->sync($request->officeSelect, false);
        $this->uploadImageService->store($request->imgLogo, $company);

        return $company;
    }

    /**
     * @throws Exception
     */
    public function update(Request $request)
    {
        //update base information of company
        $company = Company::find(['id' => $request->get('companyId')])->first();
        $company->name = $request->get('companyName');
        $company->company_desc = $request->get('companyDesc');
        $company->address = $request->get('companyAddress');
        $company->phone = $request->get('companyPhone');
        $company->start_work_time = $request->get('startTimeWork');
        $company->end_work_time = $request->get('endTimeWork');
        $company->number_of_personal = $request->get('numberOfPersonal');
        $company->country_id = $request->get('countrySelect');
        $company->office()->sync($request->get('officeSelect'));
        $company->save();
        //update company image
        if ($request->imgLogo) {
            if (!$this->uploadImageService->updateImage($request->imgLogo, $request->get('companyId'))) {
                throw new Exception("Upload image failed");
            }
        }
        return $company;

    }
}
