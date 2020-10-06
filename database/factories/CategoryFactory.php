<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [

        "name" => $faker->name,
        "meta_keywords" => $faker->paragraph,
        "meta_description" => $faker->paragraph,
    ];
});
