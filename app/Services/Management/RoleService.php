<?php

namespace App\Services\Management;

use App\Contracts\Abstracts\BaseService;
use App\Events\RoleChangedEvent;
use App\Models\Permission;
use App\Models\Role;
use App\Repositories\RoleRepository;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class RoleService extends BaseService
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new RoleRepository();
        $this->breadcrumbs = [
            "Management" => "#",
            "Roles" => route("management.roles.index"),
        ];
    }

    /**
     * @return true[]
     */
    public function getAllDataRole(): array
    {
        if (!($roles = Cache::get(config("cache.keys.all_role")))) {
            $roles = $this->repository->getAllData();
            Cache::put(config("cache.keys.all_role"), $roles);
        }

        try {
            $response = [
                "success" => true,
                "title" => "Role",
                "pageTitle" => "Role",
                "pageSubTitle" => "Role that will attach to every user",
                "roles" => $roles,
                "breadcrumbs" => $this->getBreadcrumbs()
            ];
        } catch (Exception $e) {
            $response = getDefaultErrorResponse($e);
        }

        return $response;
    }

    /**
     * @return array
     */
    public function getCreateData(): array
    {
        $this->addBreadCrumbs([
            "Create" => route("management.roles.create")
        ]);
        return [
            "success" => true,
            "title" => "Role",
            "pageTitle" => "Role",
            "pageSubTitle" => "Role that will attach to every user",
            "breadcrumbs" => $this->getBreadcrumbs(),
            "permissions" => PermissionService::getAllPermission()->groupBy("feature_group")
        ];
    }

    /**
     * @param array $requestedData
     * @return array
     */
    public function addNewDataRole(array $requestedData): array
    {
        try {
            $response = [
                "success" => true
            ];

            DB::beginTransaction();
            /** @var Role $role */
            $role = $this->repository->addNewData($requestedData);

            if (isset($requestedData["permissions"])){
                $role->syncPermissions($requestedData["permissions"]);
            }

            RoleChangedEvent::dispatch();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            $response = getDefaultErrorResponse($e);
        }

        return $response;
    }
}
