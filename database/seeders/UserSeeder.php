<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public const array DATA_USERS = [
        [
            "first_name" => "superadmin",
            "last_name" => "superadmin",
            "email" => "superadmin@mail.com",
            "password" => "admin"
        ]
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::DATA_USERS as $user){
            User::query()->create($user);
        }

        User::factory()->count(100)->create();
    }
}
