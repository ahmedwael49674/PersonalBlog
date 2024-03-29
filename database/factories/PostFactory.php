<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->word(2),
        'content' => $faker->paragraph,
    ];
});
