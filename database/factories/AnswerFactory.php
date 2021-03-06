<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Models\Question;
use App\Models\Answer;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'question_id' => function () {
            return factory(Question::class)->create()->id;
        },
        'content' => $faker->text,
    ];
});
