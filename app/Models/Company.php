<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Company extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'companys';


    protected $fillable = [
        'name', 'company_desc', 'address', 'email', 'password', 'phone', 'start_work_time', 'end_work_time', 'number_of_personel'
    ];

    protected $hidden = [
        'country_id', 'logo_img', 'password', 'remember_token'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }
}