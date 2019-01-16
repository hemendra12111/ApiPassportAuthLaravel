<?php

use Faker\Generator as Faker;

$factory->define(App\Teacher::class, function (Faker $faker) {
	$gender = $faker->randomElement(['male', 'female']);
	$subject = $faker->randomElement(['Hindi', 'English','Math','Science','Social-Science','Sanskrit','Urdu','History','Geography','Botany','Physics','Chemistry','Commerece','English-lit','Hindi-lit','Sanskrit-lit','Biology']);
    return [
        'name'=>$faker->name($gender),
        'user_id'=>App\User::all()->random()->id,
        'email'=>$faker->unique()->safeEmail,
        'gender' => $gender,
        'subject'=> $subject,
        'dob' => $faker->date($format = 'd-m-Y', $max = 'now'),
        'phone'=>$faker->phoneNumber
    ];
});
