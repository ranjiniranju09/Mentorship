<?php

namespace App\Models;

<<<<<<< HEAD
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
=======
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
>>>>>>> 0c87cc8 (mentor2)

    /**
     * The attributes that are mass assignable.
     *
<<<<<<< HEAD
     * @var array<int, string>
=======
     * @var array
>>>>>>> 0c87cc8 (mentor2)
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
<<<<<<< HEAD
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
=======
     * The attributes that should be hidden for arrays.
     *
     * @var array
>>>>>>> 0c87cc8 (mentor2)
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
<<<<<<< HEAD
     * The attributes that should be cast.
     *
     * @var array<string, string>
=======
     * The attributes that should be cast to native types.
     *
     * @var array
>>>>>>> 0c87cc8 (mentor2)
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
