<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Rider;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(Rider::class, function (Faker $faker) {
    $gender = $faker->randomElement($array = array('Male', 'Female'));
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'gender' => $gender,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'birth_day' => rand(01, 31),
        'birth_month' => rand(01, 12),
        'birth_year' => rand(1960, date('Y')),
    ];
});
