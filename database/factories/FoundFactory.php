<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Found>
 */
class FoundFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'nama' => fake()->name(),
           'nama_barang'=> fake()->randomElement(),
           'deskripsi_barang'=> fake()->sentence(3),
           'foto_barang'=> fake()->image(),
           'tgl_ditemukan'=> fake()->date(),
           'tgl_claim'=> fake()->date(),
           'nomorhp' => fake()->phoneNumber(12),
           'foto_identitas'=>fake()->image()
        ];
    }
}
