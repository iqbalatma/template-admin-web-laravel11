<?php

namespace App\Services\Management;
use App\Contracts\Abstracts\BaseService;
use App\Repositories\PermissionRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class PermissionService extends BaseService
{
    protected $repository;

    public function __construct()
    {
        // $this->repository
    }

    public function getAllData():array
    {
        return [
            "title" => "Permission",
            "pageTitle" => "Permission",
            "pageSubTitle" => "Permission that allow user to access feature",
            "permissions" => self::getAllPermission()
        ];
    }


    /**
     * @return Collection
     */
    public static function getAllPermission(): Collection
    {
        if(!($permissions = Cache::get(config("cache.keys.all_permission")))){
            $permissions = PermissionRepository::getAllData();
            Cache::put(config("cache.keys.all_permission"), $permissions);
        }

        return $permissions;
    }
}
