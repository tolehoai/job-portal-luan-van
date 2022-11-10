<?php

namespace App\Service;

use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TitleService
{
    public function store(Request $request)
    {
        $title = Title::firstOrCreate([
            'name' => $request->get('titleName'),
            'slug' => Str::slug($request->get('titleName'))
        ]);

        return $title;
    }

    public function update(Request $request)
    {
        //update base information of company
        $title       = Title::find(['id' => $request->get('titleId')])->first();
        $title->name = $request->get('skillName');
        $title->slug = Str::slug($request->get('skillName'));
        $title->save();

        return $title;
    }

    public function delete(string $titleId)
    {
        return Title::where('id', $titleId)->delete();
    }
}

