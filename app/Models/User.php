<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function internshipsAsStudent()
    {
        return $this->hasMany(Internship::class, 'student_id');
    }

    public function internshipsAsSupervisor()
    {
        return $this->hasMany(Internship::class, 'supervisor_id');
    }

    public function reports()
    {
        return $this->hasMany(Report::class, 'student_id');
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class, 'student_id');
    }

    public function evaluationsGiven()
    {
        return $this->hasMany(Evaluation::class, 'supervisor_id');
    }

    public function userNotifications()
    {
        return $this->hasMany(UserNotification::class, 'user_id');
    }
}
