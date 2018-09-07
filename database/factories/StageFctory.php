<?php

use Faker\Generator as Faker;
use App\Stage;
use App\Board;

$factory->define(App\Stage::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'board_id' => Board::all()->random()->id,
        'order' => $faker->numberBetween(1, 3),
    ];
});



