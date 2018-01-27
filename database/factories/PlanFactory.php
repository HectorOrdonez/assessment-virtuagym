<?php

use Faker\Generator as Faker;

$factory->define(\Virtuagym\Plan\Entity\Plan::class, function (Faker $faker) {
    return [
        'name' => $faker->name . ' plan',
    ];
});
