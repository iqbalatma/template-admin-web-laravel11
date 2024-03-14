<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public const array DATA_MENU = [
        [
            "id" => "9b8f8e39-3f52-4465-aa95-a371520e3c00",
            "label" => "Management",
            "route_name_group" => null,
            "route_name" => null,
            "icon" => '<i class="bi bi-card-list"></i>',
            "parent_id" => null,
            "permission_name" => "s",
            "level" => 1,
        ],
        [
            "id" => "9b8f8e39-3f52-4465-aa95-a371520e3c01",
            "label" => "Roles",
            "route_name_group" => "management.roles",
            "route_name" => "management.roles.index",
            "icon" => null,
            "parent_id" => "9b8f8e39-3f52-4465-aa95-a371520e3c00",
            "permission_name" => "s",
            "level" => 2,
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::DATA_MENU as $menu){
            Menu::query()->create($menu);
        }
    }
}
