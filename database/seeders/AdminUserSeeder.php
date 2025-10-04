<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'surname' => 'admin',
            'patronymic' => 'admin',
            'email' => 'aaa@gmail.com',
            'password' => Hash::make('11111111'),
            'role' => 'admin',
        ]);
    }
}
