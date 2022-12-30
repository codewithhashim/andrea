<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'city',
        'resume',
        'questions',
        'prev_job',
    ];

    protected $casts = [
        'languages' => 'array',
        'questions' => 'array',
        'prev_job' => 'array'
    ];
}
