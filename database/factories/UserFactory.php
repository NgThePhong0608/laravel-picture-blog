<?php

namespace Database\Factories;

use Faker\Provider\en_US\Address;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->faker->addProvider(new Address($this->faker));
        return [
            'name' => $this->faker->name(),
            'email' => $email = $this->faker->unique()->safeEmail(),
            'username' => $this->generateUsername($email),
            'city' => rand(0, 1) === 0 ? null : $this->faker->city(),
            'country' => rand(0, 1) === 0 ? null : $this->faker->country(),
            'about_me' => rand(0, 1) === 0 ? null : $this->faker->text(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];

    }

    protected function generateUsername($email)
    {
        $username = strstr($email, '@', true);
        if (!$username) {
            $username = 'user' . rand(1000, 9999); // Generate a fallback username
        }
        return $username;
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
