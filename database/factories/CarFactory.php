<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Car;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    return [
        "producer_id" => rand(1,3),
        "model" => Str::random(8),
        "engine" => Str::random(4),
        "vin" => Str::random(10),
        "year" => $faker->year
    ];
});
