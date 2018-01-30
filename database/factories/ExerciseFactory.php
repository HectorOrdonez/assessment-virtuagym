<?php

use Faker\Generator as Faker;
use Virtuagym\Plan\Entity\Exercise;

$factory->define(Exercise::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
    ];
});
