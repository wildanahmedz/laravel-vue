<?php

use Faker\Generator as Faker;

$factory->define(App\Wishlist::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'channel_id' => $faker->uuid,
        'product_id' => $faker->uuid,
        'customer_id' => $faker->uuid,
        'item_options' => $faker->numberBetween($min = 1000, $max = 9000),
        'moved_to_cart' => $faker->dateTime,
        'shared' => $faker->randomnumber(2),
        'time_of_moving' => $faker->dateTime,
    ];
});
