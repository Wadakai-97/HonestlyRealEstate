<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'phone' => $faker->phone_number(),
        'address' => $faker->address(),
        'type' => $faker->randomElement($type),
        'content' => $faker->realText(200),
    ];
});
