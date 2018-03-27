<?php
use Carbon\Carbon; // You need to import Carbon
$factory->define(App\Capture::class, function (Faker\Generator $faker) {
    return [
         'sensor_id' => rand(1, 2),
         'value' => rand(20, 30),
         'capture_time' => Carbon::now()
    ];
});
