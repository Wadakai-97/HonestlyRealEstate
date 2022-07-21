<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Information;
use App\Models\Staff;
use Faker\Generator as Faker;

$factory->define(Information::class, function (Faker $faker) {
    return [
        'title' => $faker->word(10),
        'body' => $faker->realText(300),
    ];
});
