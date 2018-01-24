<?php

$factory->define(App\Employee::class, function (Faker\Generator $faker) {
    return [
        "first_name" => $faker->name,
        "last_name" => $faker->name,
        "job_title" => $faker->name,
        "email" => $faker->safeEmail,
        "phone" => $faker->name,
    ];
});
