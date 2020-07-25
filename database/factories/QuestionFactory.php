<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use App\User;
use App\Models\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'title' => $faker->sentence,
        'content' => $faker->text,
    ];
});

$factory->state(Question::class, 'published', function (Faker $faker) {
    return [
        'published_at' => Carbon::parse('-1 week'),
    ];
});

$factory->state(Question::class, 'unpublished', function (Faker $faker) {
    return [
        'published_at' => null,
    ];
});
