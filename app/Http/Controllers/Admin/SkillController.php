<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Service\SkillService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SkillController extends Controller
{
    private SkillService $skillService;

    public function __construct(SkillService $skillService)
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

    public function editSkill(Request $request
    ): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application {
        if ($request->method() == 'GET') {
            return view('pages/admin/skill/editSkill', [
                "skill" => Skill::where('id', $request->skillId)->first()
            ]);
        }
        $skill = $this->skillService->update($request);
        if (!$skill) {
            return redirect()->route('admin.edit-skill')
                             ->with('error', 'Cập nhật kỹ năng thất bại')
                             ->withInput();
        }

        return redirect()->route('admin.skill')->with('success', 'Cập nhật kỹ năng thành công')->withInput();
    }


    public function delete(Request $request)
    {
        if ($this->skillService->delete($request->skillId)) {
            alert()->success('Thành công', 'Bạn đã xóa kỹ năng');
        } else {
            alert()->error('Thất bại', 'Có lỗi xảy ra khi xóa kỹ năng');
        }

        return redirect()->route('admin.skill');
    }
}
