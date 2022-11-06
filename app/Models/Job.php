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
        'is_active',
        'salary',
        'job_desc',
        'job_requirements',
        'city_id',
    ];

    protected $hidden = [];

}
