<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Technology extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'technology';


    protected $fillable = [
        'name',
        'slug'
    ];

    protected $hidden = [];
}
