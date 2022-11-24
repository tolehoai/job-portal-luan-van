<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Company extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, CascadeSoftDeletes;

    protected $table = 'companies';
    public $timestamps = true;
    protected $cascadeDeletes = ['jobs', 'office', 'image', 'cover'];

    protected $fillable = [
        'name',
        'company_desc',
        'address',
        'email',
        'password',
        'phone',
        'start_work_time',
        'end_work_time',
        'number_of_personal',
        'country_id',
        'logo_img'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function office()
    {
        return $this->belongsToMany(City::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function cover()
    {
        return $this->morphOne(Cover::class, 'imageable');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
