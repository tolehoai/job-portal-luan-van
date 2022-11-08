<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Job extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'job';


    protected $fillable = [
        'title',
        'company_id',
        'is_active',
        'salary',
        'job_desc',
        'job_requirements',
        'job_type_id',
        'job_level_id',
    ];

    protected $hidden = [];

    public function jobType()
    {
        return $this->belongsTo(JobType::class);
    }

    public function jobLevel()
    {
        return $this->belongsTo(JobLevel::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function skill()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function technology()
    {
        return $this->belongsToMany(Technology::class);
    }

    public function city()
    {
        return $this->belongsToMany(City::class);
    }


}
