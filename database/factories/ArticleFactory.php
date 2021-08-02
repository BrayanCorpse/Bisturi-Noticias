<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    $title = $faker->unique()->word(10);
    return [
        'title'         => $title,
        'content'       => $faker->text($maxNbChars = 500),
        'user_id'       => rand(1,10),
        'category_id'   => rand(1,10),
        'slug'          => str_slug($title)
    ];
});
