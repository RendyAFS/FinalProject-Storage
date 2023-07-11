<?php

namespace Database\Seeders;

use App\Models\Lost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lost::factory()->count(10)->create();
    }
}
