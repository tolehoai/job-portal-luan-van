<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';
    public $timestamps = true;


    protected $fillable = [
        'name',
        'slug'
    ];

    public function company()
    {
        return $this->belongsToMany(Company::class);
    }

    public function job()
    {
        return $this->belongsToMany(Job::class);
    }
}
