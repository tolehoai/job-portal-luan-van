<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Skill extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'skills';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'slug'
    ];

    protected $hidden = [];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    //skill have many jobs
    public function jobs()
    {
        return $this->belongsToMany(Job::class);
    }

}
