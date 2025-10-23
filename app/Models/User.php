<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'phone',
        'npwp',
        'avatar'
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
            'phone' => 'string',
            'gender' => Gender::class,
        ];
    }

    public function answers()
    {
        return $this->hasMany(Answers::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function sentChats()
    {
        return $this->hasMany(Chat::class, 'from_user_id');
    }

    public function receivedChats()
    {
        return $this->hasMany(Chat::class, 'to_user_id');
    }

    public function lkpdAnswer()
    {
        return $this->hasOne(LkpdAnswer::class);
    }
}