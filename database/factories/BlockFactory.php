<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Block;
use App\Document;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Block::class, function (Faker $faker) {
    return [
        'content' => $faker->text,
        'position' => 0,
        'version' => Str::uuid()->toString(),
        'document_id' => factory(Document::class),
    ];
});
