<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lost>
 */
class LostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama'=> fake()->name(),
            'nama_barang'=>fake()->randomElement(),
            'deskripsi_barang'=>fake()->sentence(4),
            'foto_barang'=>fake()->image(),
            'nomorhp'=>fake()->phoneNumber(12),
            'tgl_kehilangan'=>fake()->date()
        ];
    }
}
