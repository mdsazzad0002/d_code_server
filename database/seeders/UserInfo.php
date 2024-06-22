<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserInfo extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=> 'admin',
            'email'=> 'admin@gmail.com',
            'email_verified_at' => now(),
            'role'=>'admin',
            'password'=>  Hash::make('Pa$$w0rd!')
        ]
        );
        User::create(
            [
                'name' => 'Jane Smit1h',
                'email' => 'jane@example.com',
                'role' => 'user',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]

        );
        User::create(

            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com1',
                'role' => 'user',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]

        );
    }
}
