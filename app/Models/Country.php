<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';
    public $timestamps = true;

    protected $fillable = [
        'country_name',
        'country_name_slug'
    ];

    public function company()
    {
        return $this->hasMany(Company::class);
    }

}
