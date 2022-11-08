<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class JobType extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'job_types';


    protected $fillable = [
        'name',
        'slug'
    ];

    protected $hidden = [];

    public function job()
    {
        return $this->hasMany(Job::class);
    }
}
