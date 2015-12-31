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

$factory->define(FlairBooks\Category::class, function (Faker\Generator $faker) {
    return [
        'code' => $faker->word,
        'name' => $faker->sentence
    ];
});

$factory->define(FlairBooks\Author::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->name,
        'last_name'	=> $faker->name,
        'telephone' => $faker->phoneNumber
    ];
});

$factory->define(FlairBooks\Book::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(6),
        'description' => $faker->paragraph(),
        'isbn' => $faker->isbn13
    ];
});