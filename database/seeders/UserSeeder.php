<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // إنشاء 1000 User
       User::factory(1000)->create([
        'role' => 'user',
    ]);

    // إنشاء 100 Admin
    User::factory(100)->create([
        'role' => 'admin',
    ]);
}
    }

