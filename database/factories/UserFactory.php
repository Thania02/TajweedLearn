<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'User Name',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$Y62b2z8.X2cOxoZB7P91auAZ.9apKwU2exG/zQ1gS8W5wXu3xVuv2', // password = 123123123
            'role' => 'Admin',
            'photo' => 'luffy.jpg',
            'remember_token' => Str::random(10),
        ];
    }
}
