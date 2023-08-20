<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(1)->create([
            'name' => 'Admin',
            'password' => '$2y$10$pcU61bF83kHYrxEZ6sGUnO4GWUx7I57ttkMkHPTZ/xRO2wRsHZXTq',
            'email' => 'ad@min.com',
            'avatar' => null,
            'is_admin' => true,
        ]);
    }
}
