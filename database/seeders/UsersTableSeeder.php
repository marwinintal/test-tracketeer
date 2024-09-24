<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => Str::uuid()->toString(),
                'name' => 'Marwin Intal',
                'email' => 'marwinintal@example.com',
                'username' => 'marwinintal',
                'password' => Hash::make('password'), // Hash the password
                'remember_token' => Str::random(10),
            ],
            [
                'id' => Str::uuid()->toString(),
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'username' => 'johndoe',
                'password' => Hash::make('password'), // Hash the password
                'remember_token' => Str::random(10),
            ],
            [
                'id' => Str::uuid()->toString(),
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'username' => 'janesmith',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
        ];

        DB::table('users')->insert($users);
    }
}
