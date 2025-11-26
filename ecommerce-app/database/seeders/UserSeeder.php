<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Manager User',
            'email' => 'manager@gmail.com',
            'phone' => '9861437776',
            'role' => 'Manager',
            'password'=> Hash::make('manager12345'),
            'status'    => 1
        ]);
    }
}
