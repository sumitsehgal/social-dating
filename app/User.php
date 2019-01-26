<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
use Carbon\Carbon;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

use Hootlex\Friendships\Traits\Friendable;

class User extends Authenticatable implements HasMedia //implements MustVerifyEmail
{
    use Notifiable, Billable, HasMediaTrait, Friendable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'dob', 'gender', 'provider', 'provider_id', 'access_token', 'avatar', 'email_verified_at'
    ];

    protected $casts = [
        'dob' => 'datetime:Y-m-d',
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

    public function my_validate($data)
    {
        if(array_key_exists('dob', $data) && !empty($data['dob']))
        {
            $data['dob'] = Carbon::parse($data['dob']);
        }
        return $data;
    }

    public function isOnline()
    {
        $currentAt =  \Carbon\Carbon::now()->subMinutes(self::ONLINE_TIME_WINDOW); // Currently Online Window is 5 Minutes
        return ($this->lastActivity >= $currentAt);
    }

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    // public function registerMediaConversions(Media $media = null)
    // {
    //     $this->addMediaConversion('thumbs')
    //         ->width(50)
    //         ->height(50);
    // }
}
