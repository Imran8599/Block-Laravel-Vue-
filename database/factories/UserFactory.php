<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'cat_name' => $faker->word,
    ];
});
$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'cat_id' => rand(1,20),
        'user_id' => rand(1,20),
        'comment_id' => rand(1,20),
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'photo' => $faker->imageUrl,
    ];
});
