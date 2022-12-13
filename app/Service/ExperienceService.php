<?php

namespace App\Service;

use App\Models\Experience;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ExperienceService
{
    public function store(Request $request, string $userId)
    {

        $storeRequest               = $request->except('_token');
        $storeRequest['start_date'] = Carbon::parse($storeRequest['start_date'])->format('Y-m-d');
        $storeRequest['end_date']   = $request->get('end_date') ?
            Carbon::parse($storeRequest['end_date'])->format('Y-m-d') : null;
        $storeRequest['user_id']    = $userId;

        return Experience::updateOrCreate($storeRequest);

    }

    public function update(Request $request, string $experienceId)
    {
        $updateRequest              = $request->except('_token');
        $updateRequest               = $request->except('_token');
        $updateRequest['start_date'] = Carbon::parse($updateRequest['start_date'])->format('Y-m-d');
        $updateRequest['end_date']   = $request->get('end_date') ?
            Carbon::parse($updateRequest['end_date'])->format('Y-m-d') : null;
        return Experience::find(['id' => $experienceId])->first()->update($updateRequest);
    }

   //delete experience with experience_id of user_id
    public function delete(string $experienceId, string $userId)
    {
        return Experience::where('id', $experienceId)->where('user_id', $userId)->delete();
    }

}
