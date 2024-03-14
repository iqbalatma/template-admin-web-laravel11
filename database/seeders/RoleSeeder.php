<?php

namespace Database\Seeders;

use App\Enums\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public const array DATA_ROLE = [
        [
            "id" => "9b8f868a-2f75-4bb4-af0d-75a1fd5aa921",
            "name" => Role::SUPER_ADMIN->value,
            "guard_name" => "web"
        ],
        [
            "id" => "9b8f868a-2f75-4bb4-af0d-75a1fd5aa922",
            "name" => Role::ADMIN->value,
            "guard_name" => "web"
        ],
        [
            "id" => "9b8f868a-2f75-4bb4-af0d-75a1fd5aa923",
            "name" => Role::REGULAR_USER->value,
            "guard_name" => "web"
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::DATA_ROLE as $role){
            \App\Models\Role::query()->create($role);
        }
    }
}
