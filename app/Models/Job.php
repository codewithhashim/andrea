<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'open',
        'company',
        'avatar',
        'location',
        'jobTitle',
        'description',
        'slug',
        'jobType',
        'employmentType',
        'experience',
        'salary',
        'jobLevel',
        'category',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', "id");
    }
}
