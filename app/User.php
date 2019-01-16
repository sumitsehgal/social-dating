<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;

class User extends Authenticatable //implements MustVerifyEmail
{
    use Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'dob', 'gender', 'provider', 'provider_id', 'access_token', 'avatar', 'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    const MALE_GENDER = 'Male',
        FEMALE_GENDER = 'FEMALE';

    const ONLINE_TIME_WINDOW = 5;

    public function isOnline()
    {
        $currentAt =  \Carbon\Carbon::now()->subMinutes(self::ONLINE_TIME_WINDOW); // Currently Online Window is 5 Minutes
        return ($this->lastActivity >= $currentAt);
    }
}
