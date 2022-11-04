<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\CreateCompanyRequest;
use App\Models\Company;
use App\Models\Country;
use App\Models\Skill;
use App\Models\Technology;
use App\Service\CompanyService;
use App\Service\SkillService;
use App\Service\TechnologyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class TechnologyController extends Controller
{
    private TechnologyService $technologyService;

    public function __construct(TechnologyService $technologyService)
    {
        $this->technologyService = $technologyService;
    }

    public function index()
    {
        return view('pages/admin/technology/list', [
            'technologies' => Technology::paginate(15)
        ]);
    }

    public function addTechnology(Request $request
    ): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application {
        if ($request->method() == 'GET') {
            return view('pages/admin/technology/addTechnology');
        }
        $technology = $this->technologyService->store($request);
        if (!$technology->wasRecentlyCreated) {
            return redirect()->route('admin.add-technology')
                             ->with('error', 'Tạo mới kỹ công nghệ bại, công nghệ đã tồn tại')
                             ->withInput();
        }

        return redirect()->route('admin.technologies')->with('success', 'Tạo mới công nghệ thành công')->withInput();
    }

    public function editTechnology(Request $request
    ): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application {
        if ($request->method() == 'GET') {
            return view('pages/admin/technology/editTechnology', [
                "technology" => Technology::where('id', $request->technologyId)->first()
            ]);
        }
        $technology = $this->technologyService->update($request);
        if (!$technology) {
            return redirect()->route('admin.edit-technology')
                             ->with('error', 'Cập nhật công nghệ thất bại')
                             ->withInput();
        }

        return redirect()->route('admin.technologies')->with('success', 'Cập nhật công nghệ thành công')->withInput();
    }


    public function delete(Request $request)
    {
        if ($this->technologyService->delete($request->technologyId)) {
            alert()->success('Thành công', 'Bạn đã xóa công ngệ');
        } else {
            alert()->error('Thất bại', 'Có lỗi xảy ra khi xóa cng nghệ');
        }
        return redirect()->route('admin.technologies');
    }
}
