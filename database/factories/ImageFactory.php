<?php

use Faker\Generator as Faker;

$factory->define(App\Image::class, function (Faker $faker) {



    $dir = 'public/images/articles/';

    return [
        'name'       => $faker->image($dir, $width = 640, $height = 480, null, false),
        'article_id' => rand(1,15)
    ];
});
