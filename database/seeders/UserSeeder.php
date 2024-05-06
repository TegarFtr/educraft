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
        $userData = [
            [
                'nis' => '1',
                'nama' => 'Admin',
                'username' => 'admin',
                'password_login' => '123',
                'password' => bcrypt('123'),
                'role' => 'admin'
            ],
            [
                'nis' => '2',
                'nama' => 'Guru',
                'username' => 'guru',
                'password_login' => '123',
                'password' => bcrypt('123'),
                'role' => 'guru'
            ],
            [
                'nis' => '3',
                'nama' => 'User',
                'username' => 'user',
                'password_login' => '123',
                'password' => bcrypt('123'),
                'role' => 'user'
            ]
        ];

        foreach ($userData as $key => $data) {
            User::create($data);
        }
    }
}
