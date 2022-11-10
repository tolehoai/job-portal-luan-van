<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Title extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'titles';


    protected $fillable = [
        'name',
        'slug'
    ];

    protected $hidden = [];

}
