<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Skill extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'skills';


    protected $fillable = [
        'name',
        'slug'
    ];

    protected $hidden = [];

}
