<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Staff;
use Faker\Generator as Faker;

$factory->define(Staff::class, function (Faker $faker) {
    $position = ['主任', '係長', '課長代理', ];
    $hobby = ['釣り', 'スケボー', ];
    return [
        'staff_name'=>$faker->name(),
        'position'=>$faker->randomElement($position),
        'number_of_contracts'=>$faker->randomNumber(3),
        'birthplace'=>$faker->city(),
        'hobby'=>$faker->randomElement($hobby),
        'comment'=>$faker->realText(60),
    ];
});
