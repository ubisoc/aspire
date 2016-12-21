<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'mobile_number' => $faker->phoneNumber,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Address::class, function (Faker\Generator $faker) {

    return [
        'line1' => $faker->streetAddress,
        'line2' => $faker->streetName,
        'line3' => $faker->city,
        'city' => $faker->city,
        'country' => $faker->country,
        'postcode' => $faker->postcode,
    ];
});

$factory->define(App\Account::class, function (Faker\Generator $faker) {
    $types = ["a", "b", "c"];

    return [
        'type' => array_rand($types, 1),
    ];
});

$factory->defineAs(App\Account::class, 'company', function ($faker) {
    return [
        'type' => "b",
    ];
});

$factory->defineAs(App\Account::class, 'student', function ($faker) {
    return [
        'type' => "c",
    ];
});

$factory->defineAs(App\Account::class, 'admin', function ($faker) {
    return [
        'type' => "a",
    ];
});

$factory->define(App\StudentData::class, function (Faker\Generator $faker) {

    return [
        'university_id' => $faker->biasedNumberBetween(1000000, 9999999),
        'biography' => $faker->realText,
        'location_pref' => $faker->city,
        'job_pref' => $faker->jobTitle,
    ];
});

$factory->define(App\CompanyData::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->company,
        'biography' => $faker->realText,
    ];
});

$factory->define(App\Role::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->jobTitle,
        'description' => $faker->realText,
        'start_date' => $faker->date,
        'end_date' => $faker->date,
        'salary' => rand(10000, 100000),
        'skills' => $faker->sentence,
        'qualifications' => $faker->sentence,
    ];
});
