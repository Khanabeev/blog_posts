<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Reply::class, function (Faker $faker) {
    return [
        'text' => $faker->text(),
        'user_id' => $faker->numberBetween(1,7),
        'post_id' => $faker->numberBetween(1,6)
    ];
});
