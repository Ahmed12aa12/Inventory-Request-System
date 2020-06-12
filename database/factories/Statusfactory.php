<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Status;
use Faker\Generator as Faker;

$factory->define(Status::class, function (Faker $faker) {
    return [
        'Name_En'=>$faker->name,
        'Name_Ku'=>$faker->name,
        'Name_Ar'=>$faker->name
    ];
}
);
