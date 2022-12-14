<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, CascadeSoftDeletes;

    public $timestamps = true;
    protected $cascadeDeletes = ['job', 'image', 'cover'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'title_id',
        'city_id',
        'desc',
        'phone',
        'email',
        'password',
        'other_skill',
        'verify_code'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'verify_code',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function cover()
    {
        return $this->morphOne(Cover::class, 'imageable');
    }

    public function title()
    {
        return $this->belongsTo(Title::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }


    public function skill()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function experience()
    {
        return $this->hasMany(Experience::class);
    }

    public function education()
    {
        return $this->hasMany(Education::class);
    }

    public function job()
    {
        return $this->belongsToMany(Job::class)->withPivot('file_id')->withPivot(['status', 'access_token'])->withTimestamps();
    }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }
}
