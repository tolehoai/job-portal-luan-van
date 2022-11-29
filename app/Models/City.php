<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['company', 'job', 'user'];

    //soft delete


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

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
