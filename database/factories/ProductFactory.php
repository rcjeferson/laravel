<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'        => $faker->unique()->words($nbWords = 3, $asText = true),
        'description' => $faker->sentence(),
        'price'       => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 10000),
    ];
});
