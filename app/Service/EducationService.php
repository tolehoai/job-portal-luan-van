<?php

namespace App\Service;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class EducationService
{
    public function store(Request $request, string $userId)
    {
        $storeRequest               = $request->except('_token');
        $storeRequest['start_date'] = Carbon::parse($storeRequest['start_date'])->format('Y-m-d');
        $storeRequest['end_date']   = $request->get('end_date') ?
            Carbon::parse($storeRequest['end_date'])->format('Y-m-d') : null;
        $storeRequest['user_id']    = $userId;
        return Education::updateOrCreate($storeRequest);

    }

    public function update(Request $request, string $educationId)
    {
        $updateRequest               = $request->except('_token');
        $updateRequest               = $request->except('_token');
        $updateRequest['start_date'] = Carbon::parse($updateRequest['start_date'])->format('Y-m-d');
        $updateRequest['end_date']   = $request->get('end_date') ?
            Carbon::parse($updateRequest['end_date'])->format('Y-m-d') : null;

        return Education::find(['id' => $educationId])->first()->update($updateRequest);
    }

    public function delete(string $skillId)
    {
        return Education::where('id', $skillId)->delete();
    }
}