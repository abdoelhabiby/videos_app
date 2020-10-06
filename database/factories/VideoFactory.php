<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Video;
use App\Models\Playlist;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) {

    return [
        "name" => $faker->name,
        "description" => $faker->paragraph,
        "meta_keywords" => $faker->paragraph,
        "meta_description" => $faker->paragraph,
        "youtube" => "https://www.youtube.com/watch?v=8kct5SVudoU",
        "published" => $faker->boolean,
        "admin_id" => 1,
        "playlist_id" => factory(Playlist::class)->create()->id,
        "order" => $faker->numberBetween($min = 1, $max = 100)
    ];
});
