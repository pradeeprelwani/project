<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Rides;
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

$factory->define(Rides::class, function (Faker $faker) {
    return [
        'rider_id' => 4,
        'driver_id' => 1,
        'source_lat' => '28.5342',
        'source_long' => '77.2094',
        'source_address' => 'Malviya Nagar', // password
        'destination_lat' => '26.9161',
        'destination_long' => '75.8163',
        'destination_address' => 'Ajmeri Gate',
       
    ];
});
