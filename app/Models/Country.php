<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countrys';


    protected $fillable = [
        'country_name'
    ];

    public function company()
    {
        return $this->hasMany(Company::class);
    }

}
