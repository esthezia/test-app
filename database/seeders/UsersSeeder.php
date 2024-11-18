<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'User 1',
                'email' => 'user1@yahoo.com',
                'password' => Hash::make('abc123!'), // uses APP_KEY as salt
                'role' => 'user'
            ],
            [
                'name' => 'User 2',
                'email' => 'user2@yahoo.com',
                'password' => Hash::make('abc123!'),
                'role' => 'user'
            ],
            [
                'name' => 'Agent 1',
                'email' => 'agent1@yahoo.com',
                'password' => Hash::make('abc123!'),
                'role' => 'agent'
            ],
            [
                'name' => 'Agent 2',
                'email' => 'agent2@yahoo.com',
                'password' => Hash::make('abc123!'),
                'role' => 'agent'
            ],
            [
                'name' => 'Agent 3',
                'email' => 'agent3@yahoo.com',
                'password' => Hash::make('abc123!'),
                'role' => 'agent'
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@yahoo.com',
                'password' => Hash::make('abc123!'),
                'role' => 'admin'
            ],
        ]);
    }
}
