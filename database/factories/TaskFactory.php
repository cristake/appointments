<?php

$factory->define(App\Task::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "description" => $faker->name,
        "equipment_id" => factory('App\Equipment')->create(),
        "start_time" => $faker->date("d-m-Y H:i:s", $max = 'now'),
        "end_time" => $faker->date("d-m-Y H:i:s", $max = 'now'),
        "employee_id" => factory('App\Employee')->create(),
        "status_id" => factory('App\Status')->create(),
    ];
});
