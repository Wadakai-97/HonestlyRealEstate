<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Review;
use App\Models\Staff;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    $staff_id = Staff::pluck('id')->all();
    return [
        'name' => $faker->name(),
        'review' => $faker->numberBetween(1, 5),
        'staff_id' => $faker->randomElement($staff_id),
        'comment' => $faker->realText(300),
    ];
});
