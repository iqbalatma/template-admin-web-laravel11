<?php

namespace App\Services\Management;
use App\Contracts\Abstracts\BaseService;
use App\Repositories\RoleRepository;
use Exception;

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
    public function getAllDataRole():array
    {
        try {
            $response = [
                "success" => true,
                "title" => "Role",
                "pageTitle" => "Role",
                "pageSubTitle" => "Role that will attach to every user",
                "roles" => $this->repository->getAllData(),
                "breadcrumbs" => $this->getBreadcrumbs()
            ];
        }catch (Exception $e){
            $response = getDefaultErrorResponse($e);
        }

        return $response;
    }
}
