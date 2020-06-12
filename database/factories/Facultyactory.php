<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Faculty;
use Faker\Generator as Faker;

$factory->define(Faculty::class, function (Faker $faker) {
    return [
        'Name_En' => $faker->name,
        'Name_Ku' => $faker->name,
        'Name_Ar' => $faker->name
    ];
});
