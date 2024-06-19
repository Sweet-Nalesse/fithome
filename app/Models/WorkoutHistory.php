<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class WorkoutHistory extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'workout_id', 'completed_at'];

    protected $dates = ['completed_at'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function workout()
    {
        return $this->belongsTo(Workout::class);
    }
    public function getFormattedCompletedAtAttribute()
    {
        return Carbon::parse($this->completed_at)->format('d M Y, H:i');
    }
}
