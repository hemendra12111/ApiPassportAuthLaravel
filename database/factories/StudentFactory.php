<?php

use Faker\Generator as Faker;

$factory->define(App\Student::class, function (Faker $faker) {
	$gender = $faker->randomElement(['male', 'female']);
    return [
        'name'=>$faker->name($gender),
        'user_id'=>App\User::all()->random()->id,
        'class'=>$faker->numberBetween($min = 1, $max = 12),
        'email'=>$faker->unique()->safeEmail,
        'gender' => $gender,
        'dob' => $faker->date($format = 'd-m-Y', $max = 'now'),
        'phone'=>$faker->phoneNumber
    ];
});
