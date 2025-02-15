<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutPlan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function workouts()
    {
        return $this->belongsToMany(Workout::class, 'workout_plan_workout');
    }
}

