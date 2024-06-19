<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'muscle_group',
        'media_url',
        'repetitions',
        'sets',
        'type',
    ];

    public function workouts()
    {
        return $this->belongsToMany(Workout::class)->withPivot('repetitions');
    }
    public function getMuscleGroupsAttribute($value)
    {
        return json_decode($value, true);
    }
}
