<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\Title;
use App\Service\SkillService;
use App\Service\TitleService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TitleController extends Controller
{
    private TitleService $titleService;

    public function __construct(TitleService $titleService)
    {
        $this->titleService = $titleService;
    }

    public function index()
    {
        return view('pages/admin/title/list', [
            'titles' => Title::paginate(15)
        ]);
    }

    public function addTitle(Request $request
    ): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application {
        if ($request->method() == 'GET') {
            return view('pages/admin/title/addTitle');
        }
        $title = $this->titleService->store($request);
        if (!$title->wasRecentlyCreated) {
            return redirect()->route('admin.add-title')
                             ->with('error', 'Tạo mới chức danh thất bại, chức danh đã tồn tại')
                             ->withInput();
        }

        return redirect()->route('admin.title')->with('success', 'Tạo mới chức danh thành công')->withInput();
    }

    public function editTitle(Request $request
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
