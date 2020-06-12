<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Department;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Department::class, function (Faker $faker) {
    return [
        'Name_En' => $faker->name,
        'Name_Ku' => $faker->name,
        'Name_Ar' => $faker->name,
        'faculty_id'=>$faker->buildingNumber 

        
    ];
});
