<?php

$factory->define(FlairBooks\User::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->name,
        'last_name'	=> $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});