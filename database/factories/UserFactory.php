<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => 'NEW DEV ADMIN',
        'email' => 'admin@gmail.com',
        'email_verified_at' => now(),
        'telephone' => '0633699312',
        'password' => '$2y$10$WHusNskXvhOxWWRT5t8qreRKk578MwXhK1o4qI.Q8ZuqjCAe9qX.y', // azer1234
        'remember_token' => str_random(10),
        'role' => 'admin',
    ];
});
