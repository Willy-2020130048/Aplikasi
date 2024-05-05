<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
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
    public function definition(): array
    {
        return [
            'no_str' => fake()->text(),
            'nama_lengkap' => fake()->name(),
            'jenis_kelamin' => 'pria',
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->date(),
            'agama' => 'Islam',
            'alamat' => fake()->address(),
            'kode_pos' => fake()->countryCode(),
            'email' => fake()->email(),
            'no_hp' => fake()->phoneNumber(),
            'pendidikan' => 'SMA',
            'instansi' => 'Instansi',
            'hd' => fake()->year(),
            'dialisis' => fake()->year(),
            'capd' => fake()->year(),
            'foto' => fake()->address(),
            'username' => fake()->userName(),
            'password' => Hash::make('password'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
