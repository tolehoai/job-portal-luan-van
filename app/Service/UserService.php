<?php

namespace App\Service;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function update(Request $request)
    {
        $updateData = $request->except('_token');
        return User::where('id', Auth::id())
                   ->update($updateData);
    }
}