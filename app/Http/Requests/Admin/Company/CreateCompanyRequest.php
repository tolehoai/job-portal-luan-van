<?php

namespace App\Http\Requests\Admin\Company;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class CreateCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'companyName'      => 'required|max:255',
            'countrySelect'    => 'required',
            'numberOfPersonal' => 'required|number',
            'companyDesc'      => 'required',
            'companyAddress'   => 'required',
            'companyPhone'     => 'required',
            'companyEmail'     => 'required|email',
            'companyPassword'  => 'required',
            'startTimeWork'    => 'required',
            'endTimeWork'      => 'required',
            'imgLogo'          => [
                'required',
                File::types(['mp3', 'wav'])
                    ->min(1024)
                    ->max(12 * 1024),
            ],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
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
        ];
    }

    protected function failedAuthorization()
    {
    }
}
