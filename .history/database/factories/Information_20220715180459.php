<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Information;
use App\Models\Staff;
use Faker\Generator as Faker;

$factory->define(Information::class, function (Faker $faker) {
    $staff_id = Staff::pluck('id')->all();
    return [
        'title' => $faker->word(10),
        'body' => $faker->realText(300),
        'staff_id' => $faker->randomElement($staff_id),
    ];
});
