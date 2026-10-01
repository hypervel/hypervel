<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use Hypervel\Database\Eloquent\Factories\Factory;
use Hypervel\Support\Facades\Hash;
use Hypervel\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Rehash when an earlier application, such as a previous test, used different hashing settings.
        if (! isset(static::$password) || Hash::needsRehash(static::$password)) {
            static::$password = Hash::make('password');
        }

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
