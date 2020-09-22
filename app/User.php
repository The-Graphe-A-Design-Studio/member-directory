<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
<<<<<<< HEAD
        'IM_no', 'name', 'dob', 'email', 'phone', 'password', 'gender', 'photo', 'club_name', 'designation', 'occupation', 'blood_group', 'sponsorer', 'leo', 'status',
=======
        'IM_no', 'name', 'dob', 'email', 'phone', 'password', 'gender', 'photo', 'designation', 'classification', 'company', 'blood_group', 'group_id', 'sponsorer', 'api_token'
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
