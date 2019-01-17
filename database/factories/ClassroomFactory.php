<?php

use Faker\Generator as Faker;

$factory->define(App\Classroom::class, function (Faker $faker) {
    return [
        'user_id'=>App\User::all()->random()->id,
        'teacher_id'=>App\Teacher::all()->random()->id,
        'class'=>$faker->numberBetween($min = 1, $max = 12),
        'no_student'=>$faker->numberBetween($min = 40, $max = 60)
    ];
});
