<?php

use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {
    $name = $faker->unique()->word(5);
    return [
        'name' => $name
    ];
});
