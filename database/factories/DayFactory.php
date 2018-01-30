<?php

use Faker\Generator as Faker;
use Virtuagym\Plan\Entity\PlanDay;

$factory->define(PlanDay::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
    ];
});
