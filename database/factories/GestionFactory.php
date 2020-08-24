<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Gestion;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Gestion::class, function (Faker $faker) {
    return 
    [   
        'fecha_gestion_inicio'=>now(),
        'dni'=> $faker->isbn13,
        'operacion'=> $faker->sentence($nbWords = 10, $variableNbWords = true),
        'manejo'=> $faker->sentence($nbWords = 10, $variableNbWords = true),
        'conclusion'=> $faker->sentences($nb = 3, $asText = true) ,
        'tipo'=> Str::random(2)
    ];
});
