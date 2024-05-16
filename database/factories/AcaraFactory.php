<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Acara>
 */
class AcaraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nama_acara' => fake()->text(),
            'jenis_acara' => fake()->text(),
            'deskripsi_acara' => fake()->text(),
            'tgl_mulai' => fake()->date(),
            'tgl_selesai' => fake()->date(),
            'id_detail' => fake()->uuid(),
            'harga_acara' => fake()->numberBetween(50000, 100000),
            'jumlah_partisipan' => fake()->numberBetween(10, 100),
            'pengelola' => fake()->name(),
            'status' => 'online',
            'tempat' => fake()->address(),
        ];
    }
}
