<?php

use Faker\Generator as Faker;
use Virtuagym\Plan\Entity\Plan;

$factory->define(Plan::class, function (Faker $faker) {
    return [
        'name' => $faker->name . ' plan',
    ];
});
