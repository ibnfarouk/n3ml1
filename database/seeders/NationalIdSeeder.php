<?php

namespace Database\Seeders;

use App\Models\NationalId;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NationalIdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NationalId::factory()->count(10)->create();
    }
}
