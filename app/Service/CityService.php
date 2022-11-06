<?php

namespace App\Service;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CityService
{
    public function store(Request $request)
    {
        $city = City::firstOrCreate([
            'name' => $request->get('cityName'),
            'slug' => Str::slug($request->get('cityName'))
        ]);

        return $city;
    }

    public function update(Request $request)
    {
        $city = City::find(['id' => $request->cityId])->first();
        $city->name = $request->cityName;
        $city->slug = Str::slug($request->cityName);
        $city->save();

        return $city;
    }

    public function delete(string $cityId)
    {
        return City::where('id', $cityId)->delete();
    }
}

