<?php

namespace App\Service;

use App\Models\Skill;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SkillService
{
    public function store(Request $request)
    {
        $skill = Skill::firstOrCreate([
            'name' => $request->get('skillName'),
            'slug' => Str::slug($request->get('skillName'))
        ]);

        return $skill;
    }

    public function update(Request $request)
    {
        //update base information of company
        $skill       = Skill::find(['id' => $request->skillId])->first();
        $skill->name = $request->skillName;
        $skill->slug = Str::slug($request->skillName);
        $skill->save();

        return $skill;
    }

    public function delete(string $skillId)
    {
        return Skill::where('id', $skillId)->delete();
    }
}

