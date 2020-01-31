<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Department;

$factory->define(Department::class, function (Faker $faker) {
    return [
        'reparto' => $faker->unique()->randomElement(['Development', 'Marketing', 'Design', 'SEO', 'Social'])
    ];
});
