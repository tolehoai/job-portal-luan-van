<?php

namespace App\Service;

use App\Models\Skill;
use App\Models\Technology;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TechnologyService
{
    public function store(Request $request)
    {
        $technology = Technology::firstOrCreate([
            'name' => $request->get('technologyName'),
            'slug' => Str::slug($request->get('technologyName'))
        ]);

        return $technology;
    }

    public function update(Request $request)
    {
        //update base information of company
        $technology       = Technology::find(['id' => $request->technologyId])->first();
        $technology->name = $request->technologyName;
        $technology->slug = Str::slug($request->technologyName);
        $technology->save();

        return $technology;
    }

    public function delete(string $technologyId)
    {
        return Technology::where('id', $technologyId)->delete();
    }
}

