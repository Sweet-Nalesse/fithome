<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
    public function progressEntries()
    {
        return $this->hasMany(ProgressEntry::class);
    }
    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }
    public function forums()
    {
        return $this->hasMany(Forum::class);
    }
}
