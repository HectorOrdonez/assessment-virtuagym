<?php

use Faker\Generator as Faker;

$factory->define(\Virtuagym\User\Entity\User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
    ];
});
