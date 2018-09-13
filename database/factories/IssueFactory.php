<?php

use Faker\Generator as Faker;
use App\Issue;
use App\Stage;
use App\User;

$factory->define(Issue::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'stage_id' => Stage::all()->random()->id,
        'user_id' => User::all()->random()->id
    ];
});
