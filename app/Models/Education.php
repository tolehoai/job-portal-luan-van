<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'education';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'is_graduate',
        'university_name',
        'start_date',
        'end_date',
        'major',
        'gpa',
        'desc'
    ];

}
