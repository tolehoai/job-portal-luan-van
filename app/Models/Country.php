<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory, CascadeSoftDeletes;

    protected $table = 'countries';
    public $timestamps = true;
    protected $cascadeDeletes = ['companies'];


    protected $fillable = [
        'country_name',
        'country_name_slug'
    ];

    public function company()
    {
        return $this->hasMany(Company::class);
    }

}
