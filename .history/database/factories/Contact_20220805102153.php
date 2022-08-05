<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    $type = ['購入相談', '売却相談', '賃貸相談', 'その他'];
    return [
        'name' => $faker->name(),
        'phone' => $faker->phoneNumber(),
        'email' => $faker->,
        'address' => $faker->address(),
        'type' => $faker->randomElement($type),
        'content' => $faker->realText(200),
    ];
});
