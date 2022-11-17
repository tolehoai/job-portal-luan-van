<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Job extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'job';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'company_id',
        'is_active',
        'salary',
        'job_desc',
        'job_requirements',
        'job_type_id',
        'job_level_id',
        'technology_id',
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
        return $this->belongsTo(Technology::class);
    }

    public function city()
    {
        return $this->belongsToMany(City::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class)->withPivot('file_id');
    }

    public function scopeSalary($query, $minSalary, $maxSalary)
    {
        return $query->whereBetween('salary', [$minSalary, $maxSalary]);
    }

    public function scopeCity($query, $city)
    {
        return $query->whereHas('city', function ($q) use ($city) {
            $q->where('city_id', $city);
        });
    }

    public function scopeName($query, $titleOrCompanyName)
    {
        return $query->where('title', 'like', '%'.$titleOrCompanyName.'%')
                     ->orWhereHas('company', function ($q) use ($titleOrCompanyName) {
                         $q->where('name', 'like', '%'.$titleOrCompanyName.'%');
                     });
    }

    public function scopeSkill($query, $skill)
    {
        return $query->whereHas('skill', function ($q) use ($skill) {
            $q->where('skill_id', $skill);
        });
    }

}
