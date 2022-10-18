<?php

namespace App\Service;

use App\Models\Company;
use Illuminate\Http\Request;
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
        $logoImage = $this->uploadImageService->store($request->imgLogo);
        return Company::create([
            'name'               => $request->get('companyName'),
            'company_desc'       => $request->get('companyDesc'),
            'address'            => $request->get('companyAddress'),
            'email'              => $request->get('companyEmail'),
            'password'           => Hash::make($request->get('companyPassword')),
            'phone'              => $request->get('companyPhone'),
            'start_work_time'    => $request->get('startTimeWork'),
            'end_work_time'      => $request->get('endTimeWork'),
            'number_of_personal' => $request->get('numberOfPersonal'),
            'country_id'         => $request->get('countrySelect'),
            'logo_img'           => $logoImage->id,
        ]);

    }


}