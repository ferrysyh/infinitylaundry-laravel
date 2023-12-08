<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        User::create([
            'name' => 'Customer Administrator',
            'role' => 'customer',
            'balance' => 1000000,
            'email' => 'custadmin@admin.com',
            'password' => bcrypt('custadmin'),
            'remember_token' => Str::random(60),
        ]);
    }
}
