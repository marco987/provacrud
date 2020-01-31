<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Employee;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'matricola' => $faker->unique()->numberBetween(100, 999),
        'nome' => $faker->firstName,
        'cognome' => $faker->lastName
    ];
});
