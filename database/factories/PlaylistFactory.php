<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Playlist;
use Faker\Generator as Faker;

$factory->define(Playlist::class, function (Faker $faker) {

    $images  =[
        "/images/pages/jFncHaSsx3dGtXfu4CiC4iKFrIwebyqzswJyWBNQ.jpeg",
        "/images/pages/Y9E7tLrJYgRVwREQNg0DDJZGybhcdqj2toNG0Epe.jpeg",
        "/images/pages/RyJiH5i8rOwRoUFQPxVnjYsz8wjBAoME5NZnqBep.jpeg"

    ];

    return [

        "name" => $faker->name,
        "description" => $faker->paragraph,
        "meta_keywords" => $faker->title(),
        "meta_description" => $faker->title(),
        "image" => $images[round(0,2)],
        "category_id" => factory(Category::class)->create()->id
    ];
});
