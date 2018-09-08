<?php

use Faker\Generator as Faker;
use App\Issues;
use App\Stage;
use App\User;

$factory->define(Issues::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'stage_id' => Stage::all()->random()->id,
        'user_id' => User::all()->random()->id
    ];
});
