<?php

$factory->define(App\Equipment::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "is_available" => 1,
    ];
});
