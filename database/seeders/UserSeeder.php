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

        $user = User::where('email', 'admin@mail.com')->first();

        if (!$user) {
            User::create([
                'name' => 'Super Admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('admin'),
            ]);
        }
    }
}
