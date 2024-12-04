<?php

namespace Database\Seeders;

use App\Models\NationalId;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        DB::table('users')->insert([
//            'name' => 'Test User2',
//            'email' => 'test2@test.com',
//            'password' => bcrypt('password'),
//        ]);
        \App\Models\User::factory(10)->has(NationalId::factory()->count(1))->create();
    }
}
