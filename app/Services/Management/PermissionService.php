<?php

namespace App\Services\Management;
use App\Contracts\Abstracts\BaseService;
use App\Models\Permission;
use App\Models\Role;
use App\Repositories\PermissionRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class PermissionService extends BaseService
{
    public function __construct()
    {
        $this->breadcrumbs = [
            "Management" => "#",
            "Permissions" => route("management.permissions.index"),
        ];
    }

    /**
     * @return array
     */
    public function getAllData():array
    {
        return [
            "title" => "Permission",
            "pageTitle" => "Permission",
            "pageSubTitle" => "Permission that allow user to access feature",
            "breadcrumbs" => $this->getBreadcrumbs(),
            "permissions" => self::getAllPermission()
        ];
    }


    /**
     * @return Collection
     */
    public static function getAllPermission(): Collection
    {
        if(!($permissions = Cache::get(config("cache.keys.all_permissions")))){
            $permissions = PermissionRepository::getAllData();
            Cache::put(config("cache.keys.all_permissions"), $permissions);
        }

        return $permissions;
    }

    /**
     * @param Collection $permissions
     * @param Role $role
     * @return void
     */
    public static function setActivePermission(Collection &$permissions, Role $role): void
    {
        $rolePermission =  array_flip($role->permissions->pluck("name")->toArray());
        $permissions = $permissions->map(function (Permission $item) use ($rolePermission) {
            $item->is_active = isset($rolePermission[$item->name]);
            return $item;
        });
    }
}
