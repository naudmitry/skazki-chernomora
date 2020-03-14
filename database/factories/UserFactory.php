<?php

use Faker\Generator as Faker;

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
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Group::class, function (Faker $faker) {
    return
        [
            'company_id' => null,
            'title' => $faker->word,
        ];
});

$factory->define(App\Models\Admin::class, function (Faker $faker) {
    static $password;

    $name = $faker->unique()->firstName;
    $middleName = $faker->unique()->lastName;

    return [
        'name' => $name . ' ' . $middleName,
        'middle_name' => $name,
        'surname' => $middleName,
        'position' => 'Admin',
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'password' => $password ?: $password = bcrypt('123456'),
        'remember_token' => str_random(10),
        'created_from' => $faker->ipv4,
    ];
});
