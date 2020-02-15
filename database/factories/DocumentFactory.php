<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Document;
use App\User;
use Faker\Generator as Faker;

$factory->define(Document::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'creator_user_id' => factory(User::class),
    ];
});
