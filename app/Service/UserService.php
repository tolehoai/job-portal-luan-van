<?php

namespace App\Service;


use App\Models\Job;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserService
{
    private UploadImageService $uploadImageService;

    public function __construct(UploadImageService $uploadImageService)
    {
        $this->uploadImageService = $uploadImageService;
    }

    public function update(Request $request)
    {
        $updateData = $request->except('_token');
        $avatar = null;
        if (isset($updateData['avatar'])) {
            $avatar = $updateData['avatar'];
            unset($updateData['avatar']);
        }
        $user = User::find(['id' => Auth::id()])->first();
        if ($avatar != null) {
            $this->uploadImageService->updateImage($avatar, $user, null, $user);
        }
        return User::where('id', Auth::id())
            ->update($updateData);
    }

    public function updateUserSkill($skills)
    {
        $user = User::find(['id' => Auth::id()])->first();
        $user->skill()->sync($skills);

        return $user;
    }

    public function getAllUserOfCompany($companyId)
    {
        //get all user of this company
        $job = Job::where('company_id', $companyId)->get();
        //loop throw all job of this company and add all user of this job to collection
        $users = collect();
        foreach ($job as $item) {
            $users = $users->merge($item->user);
        }
        //remove duplicate user
        $users = $users->unique('id');
        //get all user of this company
        $users = $users->map(function ($user) {
            $user->job = $user->job->where('company_id', Auth::id());
            return $user;
        });
        return $users;
    }

    public function getUserInfo($userId)
    {
        $user = User::find($userId);
        //create user skill object of skill name and id
        $userSkill = collect();
        foreach ($user->skill as $skill) {
            $userSkill->push([
                'id' => $skill->id,
                'name' => $skill->name,
            ]);
        }
        //get other_skill of user and json decode to array if exist
        $otherSkill = $user->other_skill != null ? json_decode($user->other_skill) : [];
        //merge user skill and other skill
        $userSkill = $userSkill->merge($otherSkill);
        $user->skill = $userSkill;
//        dd($user->skill);
        return $user;
    }

}
