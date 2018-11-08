<?php

use Faker\Generator as Faker;
use Carbon\Carbon as Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {

    $startDate =  Carbon::createFromFormat('Y-m-d H:i:s', '1975-01-01 12:00:00');
    $endDate   =  Carbon::now();
    $randomDate = Carbon::createFromTimestamp(rand($endDate->timestamp, $startDate->timestamp))->format('Y-m-d h:i:s');

    $genders = ["Male","Female"];
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret,
        "email_verified_at" => (Carbon::now())->toDateTimeString(),
        "dob" => $randomDate,
        "gender" => $faker->randomElement($genders),
        'remember_token' => str_random(10),
    ];
});
