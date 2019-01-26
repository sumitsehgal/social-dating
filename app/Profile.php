<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'height', 'weight', 'country', 'city', 'relationship', 'looking_for', 'smoking', 'drinking', 'aboutme', 'aboutpartner', 'work_as', 'education', 'languages', 'interests', 'eye_color'
    ];

    protected $table = 'profile';

    const SINGLE_RELATIONSHIP = 'single',
            MARRIED_RELATIONSHIP = 'married',
            DIVORCED_RELATIONSHIP = 'divorced',
            WIDOWED_RELATIONSHIP = 'widowed';

    const RELATIONSHIPS = [
        self::SINGLE_RELATIONSHIP => 'Single',
        self::MARRIED_RELATIONSHIP => 'Married',
        self::DIVORCED_RELATIONSHIP => 'Divorced',
        self::WIDOWED_RELATIONSHIP => 'Widowed'
    ];

    const MALE = 'Male',
            FEMALE = 'Female',
            BOTH = 'Both';

    const LOOKING_FOR = [
        self::MALE => 'Male',
        self::FEMALE => 'FEMALE',
        self::BOTH => 'Both',
    ];

    const YES = 'Yes',
            NO = 'No';
    
    const IS_SMOKING = [
        self::YES => 'Yes',
        self::NO => 'No',
    ];

    const IS_DRINKING = [
        self::YES => 'Yes',
        self::NO => 'No',
    ];
}
