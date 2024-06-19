<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'level',
        'duration',
        'video_url',
        'instructions',
        'type',
    ];

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class)->withPivot('repetitions');
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_workout');
    }
}
