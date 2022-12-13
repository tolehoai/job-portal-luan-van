<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceYear extends Model
{
    use HasFactory;

    protected $table = 'experience_year';
    public $timestamps = true;


    protected $fillable = [
        'name'
    ];


    public function job()
    {
        return $this->belongsToMany(Job::class);
    }
}
