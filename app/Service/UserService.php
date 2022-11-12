<?php

namespace App\Service;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $avatar     = null;
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
        $user       = User::find(['id' => Auth::id()])->first();
        $user->skill()->sync($updateData['skills'], false);

        return $user;
    }
}