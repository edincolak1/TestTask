<?php

use Faker\Generator as Faker;
use App\Board;

$factory->define(App\Board::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->sentence(),
    ];
});