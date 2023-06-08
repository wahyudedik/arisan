<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'super admin',
                'email' => 'superadmin@gmail.com',
                'password' => bcrypt('123456789'),
                'role' => 'superadmin'
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456789'),
                'role' => 'admin'
            ],
            [
                'name' => 'member',
                'email' => 'member@gmail.com',
                'password' => bcrypt('123456789'),
                'role' => 'member'
            ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
