<?php

namespace App\Services\Management;

use App\Contracts\Abstracts\BaseService;
use App\Models\Permission;
use App\Repositories\RoleRepository;
use Exception;
use Illuminate\Support\Facades\Cache;

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
    public function getCreateData():array
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
            "permissions" => Permission::all()
        ];
    }
}
