<?php

namespace Database\Seeders;

use App\Enums\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Permission::cases() as $permission){
            \App\Models\Permission::query()->create([
               "name" => $permission->value,
               "guard_name" => "web",
               "description" => $permission->description(),
               "feature_group" => $permission->featureGroup(),
            ]);
        }
    }
}
