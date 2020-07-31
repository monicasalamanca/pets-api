<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Pet::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'species' => $faker->word(),
        'age' => $faker->numberBetween($min = 0, $max = 20)
    ];
});
