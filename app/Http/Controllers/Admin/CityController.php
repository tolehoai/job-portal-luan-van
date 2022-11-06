<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Service\CityService;
use Illuminate\Http\Request;

class CityController extends Controller
{

    private CityService $cityService;

    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    public function index()
    {
        return view('pages/admin/city/list', [
            'cities' => City::paginate(15)
        ]);
    }

    public function addCity(Request $request
    ): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        if ($request->method() == 'GET') {
            return view('pages/admin/city/addCity');
        }
        $city = $this->cityService->store($request);
        if (!$city->wasRecentlyCreated) {
            return redirect()->route('admin.add-city')
                ->with('error', 'Tạo mới thành phố thất bại, thành phố đã tồn tại')
                ->withInput();
        }

        return redirect()->route('admin.cities')->with('success', 'Tạo mới thành phố thành công')->withInput();
    }

    public function editCity(Request $request
    ): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        if ($request->method() == 'GET') {
            return view('pages/admin/city/editCity', [
                "city" => City::where('id', $request->cityId)->first()
            ]);
        }
        $city = $this->cityService->update($request);
        if (!$city) {
            return redirect()->route('admin.edit-city')
                ->with('error', 'Cập nhật thành phố thất bại')
                ->withInput();
        }

        return redirect()->route('admin.cities')->with('success', 'Cập nhật thành phố thành công')->withInput();
    }


    public function delete(Request $request)
    {
        if ($this->cityService->delete($request->cityId)) {
            alert()->success('Thành công', 'Bạn đã xóa thành phố');
        } else {
            alert()->error('Thất bại', 'Có lỗi xảy ra khi xóa thành phố');
        }
        return redirect()->route('admin.cities');
    }
}
