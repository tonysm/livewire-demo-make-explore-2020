<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Organisation;
use Faker\Generator as Faker;

$factory->define(Organisation::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'contact_name' => $faker->name,
        'contact_email' => $faker->companyEmail,
        'contact_phone' => $faker->phoneNumber,
        'city' => $faker->city,
        'country' => $faker->randomElement(['BR', 'BE']),
        'postal_code' => $faker->postcode,
    ];
});
