<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Job extends Model
{
    use HasFactory, Notifiable, SoftDeletes, CascadeSoftDeletes;

    protected $table = 'job';
    public $timestamps = true;
    protected $cascadeDeletes = ['user'];

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
        'experience_year_id',
        'other_skill'
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
        return $this->belongsToMany(User::class)->withPivot('file_id')->withPivot('status')->withTimestamps();
    }

    public function experienceYear()
    {
        return $this->belongsTo(ExperienceYear::class);
    }

    public function scopeSalary($query, $minSalary, $maxSalary)
    {
        if ($maxSalary == 'max') {
            return $query->where('salary', '>=', $minSalary);
        } else {
            return $query->whereBetween('salary', [$minSalary, $maxSalary]);
        }
    }

    public function scopeCity($query, $cityId)
    {
        return $query->whereHas('city', function ($query) use ($cityId) {
            $query->where('city_id', $cityId);
        });
    }

    public function scopeName($query, $titleOrCompanyName)
    {
        return $query->where('title', 'like', '%' . $titleOrCompanyName . '%')
            ->orWhereHas('company', function ($q) use ($titleOrCompanyName) {
                $q->where('name', 'like', '%' . $titleOrCompanyName . '%');
            });
    }

    public function scopeSkill($query, $skill)
    {
        return $query->whereHas('skill', function ($q) use ($skill) {
            $q->where('skill_id', $skill);
        });
    }

    //scope for job experience_year_id
    public function scopeExperience($query, $experienceYearId)
    {
        return $query->where('experience_year_id', $experienceYearId);
    }

    //scope for equal technology_id
    public function scopeTechnology($query, $technologyId)
    {
        return $query->where('technology_id', $technologyId);
    }



}
