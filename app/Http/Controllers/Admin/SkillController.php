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

class SkillController extends Controller
{
    private SkillService $skillService;

    public function __construct(CompanyService $companyService, SkillService $skillService)
    {
        $this->skillService = $skillService;
    }

    public function index()
    {
        return view('pages/admin/skill/list', [
            'skills' => Skill::paginate(15)
        ]);
    }

    public function addSkill(Request $request
    ): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application {
        if ($request->method() == 'GET') {
            return view('pages/admin/skill/addSkill');
        }
        $skill = $this->skillService->store($request);
        if (!$skill->wasRecentlyCreated) {
            return redirect()->route('admin.add-skill')->with('error', 'Tạo mới kỹ năng thất bại, kỹ năng đã tồn tại')
                             ->withInput();
        }

        return redirect()->route('admin.skill')->with('success', 'Tạo mới kỹ năng thành công')->withInput();
    }
}
