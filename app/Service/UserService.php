<?php

namespace App\Service;


use App\Models\Job;
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

    public function updateUserSkill(Request $request)
    {
        $updateData = $request->except('_token');
        $user = User::find(['id' => Auth::id()])->first();
        $user->skill()->sync($updateData['skills']);

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


}
